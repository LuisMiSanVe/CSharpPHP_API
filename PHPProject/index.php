<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

/** Enciende el reporteador de errores */
ini_set('display_errors', 1);
error_reporting(E_ALL);

/** Verifica si existe una URL via petición GET */
if (isset($_GET['url'])) {
    /// Asigna el valor de la URL de la petición
    $url = $_GET['url'];
    $response = '';

    /** Se lee el metodo solicitado [GET, POST, PUT, DELETE] */
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':{
                /// Obtiene el valor de id en la URL api.example.com/METODO/ID
                $id = intval(preg_replace('/[^0-9]+/', '', $url), 10);

                /// Obtiene el valor del metodo al que se dirige la petición
                switch ($url) {
                    case "categoria":{
                            /// Solicita el controlador correspondiente y el metodo
                            require_once 'controllers/bas_categoria_controller.php';
                            $controller = new bas_categoriaController();
                            $response = $controller->readAll();
                            /// Responde con un codigo 200 en caso de que la peticion sea correcta
                            http_response_code(200);
                            break;
                        }
                    case "categoria/$id":{
                            /// Solicita el controlador correspondiente y el metodo
                            require_once 'controllers/bas_categoria_controller.php';
                            $controller = new bas_categoriaController();
                            $response = $controller->readOne($id);
                            /// Responde con un codigo 200 en caso de que la peticion sea correcta
                            http_response_code(200);
                            break;
                        }
                    default:{
                            break;
                        }
                }
                break;
            }
        case 'POST':{
                /// Obtiene el valor de DATA, en donde estan los campos y valores a usar
                //$data = $_POST['data'];
                $data = json_decode(file_get_contents("php://input"), true);
                /// Convierte lo obtenido en DATA a un JSON y verifica que no tenga errores, si tiene errores responde 400
                switch ($url) {
                    case 'categoria':{
                            /// Solicita el controlador correspondiente y el metodo
                            require_once 'controllers/bas_categoria_controller.php';
                            $controller = new bas_categoriaController();
                            $response = $controller->create($data);
                            /// Responde con un codigo 200 en caso de que la peticion sea correcta
                            http_response_code(200);
                            break;
                        }
                    default:{
                            break;
                        }
                }
                break;
            }

        case 'DELETE':{
            /// Obtiene el valor de id en la URL api.example.com/METODO/ID
            $id = intval(preg_replace('/[^0-9]+/', '', $url), 10);
            
                switch ($url) {
                    case "categoria/$id":{
                            /// Solicita el controlador correspondiente y el metodo
                            require_once 'controllers/bas_categoria_controller.php';
                            $controller = new bas_categoriaController();
                            $response = $controller->delete($id);
                            /// Responde con un codigo 200 en caso de que la peticion sea correcta
                            http_response_code(200);
                            break;
                        }
                    default:{
                            break;
                        }
                }
                break;
            }

        default:{
                break;
            }
    }
    echo json_encode($response);
}
