<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Setting;
use AppBundle\Form\Type\SettingType;

class SettingsAdminController extends AdminController {

    public function indexAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $settings = $em->getRepository('AppBundle:Setting')
                       ->findBy( array( 'section' => 'main' ) );
        
        $form = $this->createFormBuilder(new SettingType($settings) )->getForm();

        if ($request->isMethod('POST'))
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $data = $form->getData();
                foreach ( $settings as $setting )
                {
                    $name = $setting->getName();
                    if ( isset( $data[$name] ) ) {
                        $setting->setValue( $data[$name] );
                        $em->persist($setting);
                    }
                }
                $em->flush();
            }
        }
        
        return $this->render('AppBundle:SettingsAdmin:index.html.twig', array(
            'settings' => $settings,
            'form' => $form->createView()
        ));
    }

}
