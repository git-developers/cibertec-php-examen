<?php

class View
{
	private $_controlador;
	private $_js;

	public function __construct(Request $peticion) {
		$this->_controlador = $peticion->getControlador();
		$this->_js = array();
	}


	/*
	 *  Esta funcion vuelve a cargar la pagina
	 *
	 *
	 */
	public function renderizar($vista, $partial = false)
	{
		$js = array();

		if(count($this->_js)){
			$js = $this->_js;
		}

		$_layoutParams = array(
            'ruta_css' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
            'ruta_img' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/img/',
            'ruta_js' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/js/',
            'js' => $js
		);

		$rutaView = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.phtml';


        echo '<pre> POLLO:: ';
        print_r($VALUE);
        exit;



        if(is_readable($rutaView)){
			if (!$partial) {
				include_once ROOT . 'views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.phtml';
				include_once $rutaView;
				include_once ROOT . 'views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.phtml';
			}
			else
			include_once $rutaView;
		}
		else {
			throw new Exception('Error de vista');
		}
	}

	/*
	 *  carga los js  especificos del controlador
	 *
	 */
	public function setJs(array $js)
	{
		if(is_array($js) && count($js)){
			for($i=0; $i < count($js); $i++){
				$this->_js[] = BASE_URL . 'views/' . $this->_controlador . '/js/' . $js[$i] . '.js';
			}
		} else {
			throw new Exception('Error de js');
		}
	}

}

?>
