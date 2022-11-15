<?php

namespace App\Http\Controllers;

use App\Models\Navbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class IndexController extends Controller {
    public function index() {
        /*if(Gate::denies('loggged-in')){
            return redirect(__('urls.login'))
                ->with('error', trans('auth.no-access-allowed'));
        }*/
        $config['slides']=$this->getSlides();
        $config['thumbs']=$this->getThumbs();
        $navbar=Navbar::all();

        return view('start.index')->with([
                'config'    =>  $config,
                'navbar'    =>  $navbar,
            ]);
    }

    public function getSlides(){
        $slides = array(
            '0'=> array(
                'class' => 'active',
                'src'   =>  'images/slides/muyco_slide_01.jpg',
                'alt'   =>  'Imagen 01',
                'h1'    =>  'Mueble y Confort Logo v.1.',
                'p'     =>  'Preparandonos para lo que se viene!',
                'a-text'    =>  'Ver logo V.1',
                'a-href'    =>  'images/slides/muyco_slide_01.jpg',
            ),
            '1'=> array(
                'class' => '',
                'src'   =>  'images/slides/muyco_slide_02.jpg',
                'alt'   =>  'Imagen 02',
                'h1'    =>  'Mueble y Confort Logo v.2.',
                'p'     =>  'Preparandonos para lo que se viene!',
                'a-text'    =>  'Ver logo V.2',
                'a-href'    =>  'images/slides/muyco_slide_02.jpg',
            ),
            '2'=> array(
                'class' => '',
                'src'   =>  'images/slides/muyco_slide_03.jpg',
                'alt'   =>  'Imagen 03',
                'h1'    =>  'Mueble y Confort Logo v.3.',
                'p'     =>  'Preparandonos para lo que se viene!',
                'a-text'    =>  'Ver logo V.3',
                'a-href'    =>  'images/slides/muyco_slide_03.jpg',
            ),
            '3'=> array(
                'class' => '',
                'src'   =>  'images/slides/muyco_slide_04.jpg',
                'alt'   =>  'Imagen 04',
                'h1'    =>  'Mueble y Confort Logo v.4.',
                'p'     =>  'Preparandonos para lo que se viene!',
                'a-text'    =>  'Ver logo V.4',
                'a-href'    =>  'images/slides/muyco_slide_04.jpg',
            ),
            '4'=> array(
                'class' => '',
                'src'   =>  'images/slides/muyco_slide_05.jpg',
                'alt'   =>  'Imagen 05',
                'h1'    =>  'Mueble y Confort Logo v.5.',
                'p'     =>  'Preparandonos para lo que se viene!',
                'a-text'    =>  'Ver logo V.5',
                'a-href'    =>  'images/slides/muyco_slide_05.jpg',
            ),
            '5'=> array(
                'class' => '',
                'src'   =>  'images/slides/muyco_slide_06.jpg',
                'alt'   =>  'Imagen 06',
                'h1'    =>  'Mueble y Confort Logo v.6.',
                'p'     =>  'Preparandonos para lo que se viene!',
                'a-text'    =>  'Ver logo V.6',
                'a-href'    =>  'images/slides/muyco_slide_06.jpg',
            ),
        );
        return $slides;
    }

    public function getThumbs(){
        $thumbs = array(
            '0'=> array(
                'src'   =>  'images/thumbnails/thumbnail_muyco_logo_v1.jpg',
                'img-expanded-src'  =>  'images/logos/logo_muyco_01.jpeg',
                'alt'   =>  'Thumbnail muyco Logo v.1',
                'h1'    =>  'Mueble y Confort Logo v.1.',
                'p'     =>  'Inspirado en una chapa de dirección de un hogar. Luce increíble!',
                'modal-id'  =>  'firstModal',
                'modal-label'  =>  'firstModalLabel',
                'a-text'    =>  'Ver logo V.1',
                'a-href'    =>  '#firstModal',
            ),
            '1'=> array(
                'src'   =>  'images/thumbnails/thumbnail_muyco_logo_v2.jpg',
                'img-expanded-src'  =>  'images/logos/logo_muyco_02.jpeg',
                'alt'   =>  'Thumbnail muyco Logo v.2',
                'h1'    =>  'Mueble y Confort Logo v.2.',
                'p'     =>  'Inspirado en una chapa de numeración de una casa. Wow!',
                'modal-id'  =>  'secondModal',
                'modal-label'  =>  'secondModalLabel',
                'a-text'    =>  'Ver logo V.2',
                'a-href'    =>  '#secondModal',
            ),
            '2'=> array(
                'src'   =>  'images/thumbnails/thumbnail_muyco_logo_v3.jpg',
                'img-expanded-src'  =>  'images/logos/logo_muyco_03.jpeg',
                'alt'   =>  'Thumbnail muyco Logo v.3',
                'h1'    =>  'Mueble y Confort Logo v.3.',
                'p'     =>  'Inspirado en una hamburguesa y el amor a la comida. :P',
                'modal-id'  =>  'thirdModal',
                'modal-label'  =>  'thirdModalLabel',
                'a-text'    =>  'Ver logo V.3',
                'a-href'    =>  '#thirdModal',
            ),
            '3'=> array(
                'src'   =>  'images/thumbnails/thumbnail_muyco_logo_v4.jpg',
                'img-expanded-src'  =>  'images/logos/logo_muyco_04.jpeg',
                'alt'   =>  'Thumbnail muyco Logo v.4',
                'h1'    =>  'Mueble y Confort Logo v.4.',
                'p'     =>  'Inspirado en la elegancia y la fuerza de la juventud. '.
                                'Desde el inicio de actividad de la mueblería.',
                'modal-id'  =>  'fourthModal',
                'modal-label'  =>  'fourthModalLabel',
                'a-text'    =>  'Ver logo V.1',
                'a-href'    =>  '#fourthModal',
            ),
            '4'=> array(
                'src'   =>  'images/thumbnails/thumbnail_muyco_logo_v5.jpg',
                'img-expanded-src'  =>  'images/logos/logo_muyco_05.jpeg',
                'alt'   =>  'Thumbnail muyco Logo v.5',
                'h1'    =>  'Mueble y Confort Logo v.5.',
                'p'     =>  'Inspirado en la elegancia y la fuerza de la juventud. '.
                                'Desde el inicio de actividad de la tienda online.',
                'modal-id'  =>  'fifthModal',
                'modal-label'  =>  'fifthModalLabel',
                'a-text'    =>  'Ver logo V.5',
                'a-href'    =>  '#fifthModal',
            ),
            '5'=> array(
                'src'   =>  'images/thumbnails/thumbnail_muyco_logo_v6.jpg',
                'img-expanded-src'  =>  'images/logos/logo_muyco_06.jpeg',
                'alt'   =>  'Thumbnail muyco Logo v.6',
                'h1'    =>  'Mueble y Confort Logo v.6.',
                'modal-id'  =>  'sixthModal',
                'modal-label'  =>  'SixthModalLabel',
                'p'     =>  'Inspirado en una hamburguesa y el amor a la comida. :P',
                'a-text'    =>  'Ver logo V.6',
                'a-href'    =>  '#sixthModal',
            ),
        );
        return $thumbs;
    }
}
