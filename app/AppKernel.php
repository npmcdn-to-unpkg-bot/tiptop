<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

use Symfony\Component\Yaml\Parser;
//use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $configFilename = __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'parameters.yml';
        
        $yaml = new Parser();
        $data = $yaml->parse(file_get_contents($configFilename));
        $params = $data['parameters'];
        
        try {
            
            $dsn = 'mysql:host='.$params['database_host'].
                    ';dbname='.$params['database_name'];

            $username = $params['database_user'];
            $password = $params['database_password'];
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            );
            $dbh = new PDO($dsn,$username,$password,$options);
            $stmt = $dbh->prepare("SELECT * FROM app_bundles WHERE isActive=1 ORDER BY orderBy");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $bundlesInDb = array();
            foreach ($rows as $rs) {
                $bundlesInDb[] = $rs['name'];
            }
            $dbh = NULL;

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        
        $bundlesForRegister = array();
        
        $bundlesDir = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src';
        $directoryIterator = new DirectoryIterator($bundlesDir);
        
        foreach ($directoryIterator as $fileInfo)
        {
            if ($fileInfo->isDir() && !$fileInfo->isDot())
            {
                $baseName = $fileInfo->getBasename();
                if (in_array($baseName, $bundlesInDb)) {
                    $bundlesForRegister[] = $fileInfo->getBasename();
                }
            }
        }

        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new AppBundle\AppBundle()
        ];

        foreach ($bundlesForRegister as $bundleName) {
            $bundleName = $bundleName . "\\" . $bundleName;
            $bundles[] = new $bundleName();
        }
        
        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
        }

        return $bundles;
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
    }

    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
