<?php 
namespace ChatBundle\Command;

use ChatBundle\Entity\Chat\Chat;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Wrep\Daemonizable\Command\EndlessCommand;

class DaemonCommand {//extends EndlessCommand implements ContainerAwareInterface
{
    /** @var ContainerInterface */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    protected function configure()
    {
        $this->setName('chat:server')
             ->setDescription('Start the Chat server');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $socket = stream_socket_server("tcp://127.0.0.1/chat", $errno, $errstr);

        if (!$socket) {
            die("$errstr ($errno)\n");
        }

        $connects = array();
        while (true) {
            //формируем массив прослушиваемых сокетов:
            $read = $connects;
            $read []= $socket;
            $write = $except = null;

            if (!stream_select($read, $write, $except, null)) {//ожидаем сокеты доступные для чтения (без таймаута)
                break;
            }

            if (in_array($socket, $read)) {//есть новое соединение
                $connect = stream_socket_accept($socket, -1);//принимаем новое соединение
                $connects[] = $connect;//добавляем его в список необходимых для обработки
                unset($read[ array_search($socket, $read) ]);
            }

            foreach($read as $connect) {//обрабатываем все соединения
                $headers = '';
                while ($buffer = rtrim(fgets($connect))) {
                    $headers .= $buffer;
                }
                fwrite($connect, "HTTP/1.1 200 OK\r\nContent-Type: text/html\r\nConnection: close\r\n\r\nПривет");
                fclose($connect);
                unset($connects[ array_search($connect, $connects) ]);
            }
        }

        fclose($server);
    }
}
}