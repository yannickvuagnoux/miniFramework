<?php
/**
 * Initialisation et parametrage des variables de session.
**/
session_start(); // On autorise la page à accéder à la superglobale de session (http://php.net/manual/fr/function.session-start.php).

require_once( 'ini.php' );
include_once( LIBPATH . 'autoloader.php' ); // On charge l'autoloader.
include_once( LIBPATH . 'srequest.class.php' ); // On charge le singleton de requête GET/POST.

/**
 * Test d'authentification active.
**/
if( SRequest::getInstance()->get( 'a' )!='login' && !( isset( $_SESSION ) && array_key_exists( APP_TAG, $_SESSION ) && array_key_exists( 'registered', $_SESSION[APP_TAG] ) ) ) :
    $ctrl = new UserController( SRequest::getInstance() );
    $ctrl->logonAction();
else :
    switch( SRequest::getInstance()->get( 'c' ) ) : // Selon le controller demandé,
        case 'users': // UserController :
            $ctrl = new UserController( SRequest::getInstance() ); // On instancie le contrôleur.

            /**
             * Autoroutage
            **/
            if( SRequest::getInstance()->get( 'a' )!==NULL ) :
                $methodName = SRequest::getInstance()->get( 'a' ) . 'Action';
            else :
                $methodName = 'indexAction';
            endif;
            $ctrl->$methodName();
            // switch( SRequest::getInstance()->get( 'a' ) ) : // Selon l'action demandée,
            //     case 'edit': // Cas de modification d'un profil :
            //         $ctrl->editAction();
            //         break;
            //     case 'update': // Cas de mise à jour d'un profil :
            //         $ctrl->updateAction();
            //         break;
            //     case 'add': // Cas d'ajout d'un profil :
            //         $ctrl->addAction();
            //         break;
            //     case 'delete': // Cas de modification d'un profil :
            //         $ctrl->deleteAction();
            //         break;
            //     case 'login': // Cas d'identifiaction d'un profil :
            //         $ctrl->loginAction();
            //         break;
            //     case 'logout': // Cas d'identifiaction d'un profil :
            //         $ctrl->logoutAction();
            //         break;
            //     default: // Cas par défaut (index) :
            //         $ctrl->indexAction();
            // endswitch;
            break;
        default:
            $ctrl = new PageController( SRequest::getInstance() );
            $ctrl->indexAction();
    endswitch;
endif;