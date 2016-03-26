    <?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SettingType extends AbstractType
{
    protected $settings;
    
    public function __construct( $settings ) {
        $this->settings = $settings;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        foreach ( $this->settings as $setting ) {
            switch ( $setting->getType() )
            {
                case 'image':
                    $builder->add( $setting->getName() , 'file', array('data_class' => null, 'data' => '/uploads/system/'.$setting->getValue(), 'label' => 'Добавить изображение') );
                    break;
                case 'route':
                    $builder->add( $setting->getName() , 'route', array( 'data' => $setting->getValue() ) );
                    break;
                case 'string':
                    $builder->add( $setting->getName() , 'text', array( 'data' => $setting->getValue() ) );
                default:
                    break;
            }
        }
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
//        $resolver->setDefaults(array(
//            'data_class' => 'Kit\SystemBundle\Entity\Setting'
//        ));
    }

    public function getName()
    {
        return 'settings';
    }
}