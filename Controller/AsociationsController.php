<?php

Class AsociationsController extends AppController {

    public $name = 'Asociations';

    public function add($proyect_id) {
        $this->layout = "ajax";

        $this->set('proyect_id', $proyect_id);

        if (!empty($this->data)) {

            $reemplazar = array('<', '>', '"', '–');
            $this->request->data['Asociation']['nombre'] = str_replace($reemplazar, "", $this->data['Asociation']['nombre']);

            if ($this->Asociation->saveAll($this->data)) {

                $last_id = $this->Asociation->getLastInsertId();
                $rutaArchivo = APP . "webroot" . DS . "files" . DS . "Asociaciones";
                if (!is_dir($rutaArchivo)) {
                    if (!mkdir($rutaArchivo)) {
                        echo "error creando archivo";
                        //redirect
                    }
                }

                if (!empty($this->data['Asociation']['existencia']['tmp_name'])) {
                    $nombrearchivo = "existencia-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['existencia']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando existencia', 'flash');
                    }
                }

                if (!empty($this->data['Asociation']['rut']['tmp_name'])) {
                    $nombrearchivo = "rut-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['rut']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando rut', 'flash');
                    }
                }

                if (!empty($this->data['Asociation']['cedulaRepresentante']['tmp_name'])) {
                    $nombrearchivo = "cedulaRepresentante-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['cedulaRepresentante']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando cedula.', 'flash');
                    }
                }

                if (!empty($this->data['Asociation']['certificado']['tmp_name'])) {
                    $nombrearchivo = "certificacion-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['certificado']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando certificación.', 'flash');
                    }
                }

                if (!empty($this->data['Asociation']['experiencia']['tmp_name'])) {
                    $nombrearchivo = "experiencia-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['experiencia']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando experiencia.', 'flash');
                    }
                }

                if (!empty($this->data['Asociation']['credencial']['tmp_name'])) {
                    $nombrearchivo = "credencial-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['credencial']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando credencial.', 'flash');
                    }
                }

                if (!empty($this->data['Asociation']['facultad_representante']['tmp_name'])) {
                    $nombrearchivo = "facultad_representante-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['facultad_representante']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando facultad_representante.', 'flash');
                    }
                }

                if (!empty($this->data['Asociation']['cdp']['tmp_name'])) {
                    $nombrearchivo = "cdp-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['cdp']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando Certificado disponibilidad presupuestal.', 'flash');
                    }
                }

                if (!empty($this->data['Asociation']['posesion']['tmp_name'])) {
                    $nombrearchivo = "posesion-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['posesion']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando posesion.', 'flash');
                    }
                }

                if (!empty($this->data['Asociation']['f28']['tmp_name'])) {
                    $nombrearchivo = "f28-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['f28']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando f28.', 'flash');
                    }
                }

                $this->Session->setFlash('Asociación guardada correctamente', 'flash');
                $this->redirect(array('controller' => 'Asociations', 'action' => 'index'));
            } else {
                $this->Session->setFlash('Error guardando los datos', 'flash');
                $this->redirect(array('controller' => 'pages', 'action' => 'display'));
            }
        }
    }

    public function edit($id) {
        $this->layout = "ajax";
        $this->Asociation->recursive = -1;
        if (empty($this->data)) {

            $this->data = $this->Asociation->find('first', array('conditions' => array('Asociation.id' => $id), 'fields' => array('Asociation.*')));
            $proyect_id = $this->Session->read('proyect_id');
            $codigo = $this->Session->read('codigo');
            $grupos_habilitados = array(1, 17);
            if ($this->Asociation->Proyect->Resolution->find('count', array('conditions' => array('Resolution.proyect_id' => $proyect_id))) < 1 or in_array($this->Auth->user('group_id'), $grupos_habilitados)) {
                $this->set('permitir', true);
            } else {
                $resolution_id = $this->Asociation->Proyect->Resolution->field('id', array('Resolution.proyect_id' => $proyect_id, 'Resolution.tipo' => 'ADJUDICACIÓN'));
                $rutaDocumento = APP . "webroot" . "/" . "files/resoluciones/SoporteResolucion-" . $codigo . "-" . $resolution_id . ".pdf";
                if (file_exists("../webroot/files/resoluciones/SoporteResolucion-" . $codigo . "-" . $resolution_id . ".pdf")) {
                    $this->set('permitir', false);
                } else {
                    $this->set('permitir', true);
                }
            }
        } else {
            $reemplazar = array('<', '>', '"', '–');
            $this->request->data['Asociation']['nombre'] = str_replace($reemplazar, "", $this->data['Asociation']['nombre']);
            if ($this->Asociation->save($this->data)) {

                $last_id = $this->data['Asociation']['id'];
                $rutaArchivo = APP . "webroot" . DS . "files" . DS . "Asociaciones";
                if (!is_dir($rutaArchivo)) {
                    if (!mkdir($rutaArchivo)) {
                        echo "error creando archivo";
                        //redirect
                    }
                }

                if (!empty($this->data['Asociation']['existencia']['tmp_name'])) {
                    $nombrearchivo = "existencia-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['existencia']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando cedula', 'flash_error');
                    }
                }

                if (!empty($this->data['Asociation']['rut']['tmp_name'])) {
                    $nombrearchivo = "rut-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['rut']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando cedula', 'flash_error');
                    }
                }

                if (!empty($this->data['Asociation']['cedulaRepresentante']['tmp_name'])) {
                    $nombrearchivo = "cedulaRepresentante-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['cedulaRepresentante']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando cedula', 'flash_error');
                    }
                }

                if (!empty($this->data['Asociation']['certificado']['tmp_name'])) {
                    $nombrearchivo = "certificacion-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['certificado']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando certificación.', 'flash_error');
                    }
                }

                if (!empty($this->data['Asociation']['experiencia']['tmp_name'])) {
                    $nombrearchivo = "experiencia-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['experiencia']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando experiencia.', 'flash_error');
                    }
                }

                if (!empty($this->data['Asociation']['credencial']['tmp_name'])) {
                    $nombrearchivo = "credencial-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['credencial']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando credencial.', 'flash_error');
                    }
                }

                if (!empty($this->data['Asociation']['facultad_representante']['tmp_name'])) {
                    $nombrearchivo = "facultad_representante-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['facultad_representante']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando facultad_representante.', 'flash_error');
                    }
                }

                if (!empty($this->data['Asociation']['cdp']['tmp_name'])) {
                    $nombrearchivo = "cdp-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['cdp']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando Certificado disponibilidad presupuestal.', 'flash_error');
                    }
                }

                if (!empty($this->data['Asociation']['posesion']['tmp_name'])) {
                    $nombrearchivo = "posesion-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['posesion']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando posesion.', 'flash_error');
                    }
                }

                if (!empty($this->data['Asociation']['f28']['tmp_name'])) {
                    $nombrearchivo = "f28-" . $last_id . ".pdf";
                    if (!move_uploaded_file($this->data['Asociation']['f28']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->Session->setFlash('Error adjuntando f28.', 'flash');
                    }
                }

                $this->Session->setFlash('Registro editado correctamente', 'flash');
                $this->redirect(array('controller' => 'Asociations', 'action' => 'index'));
            } else {
                $this->Session->setFlash('Error editando datos', 'flash_error');
            }
        }
    }

    public function index() {
        if (!$this->RequestHandler->isAjax()) {
            $this->layout = "default";
        } else {
            $this->layout = "ajax";
        }
        $this->set('aleatorio', rand(1111, 9999999));
        $proyect_id = $this->Session->read('proyect_id');
        if ($proyect_id != "") {
            $this->set('proyect_id', $proyect_id);
            $this->paginate = array('Asociation' => array('maxLimit' => 500, 'limit' => 50, 'fields' => array('Asociation.*')));
            $this->set('Asociations', $this->paginate(array('Asociation.proyect_id' => $proyect_id)));

            $codigo = $this->Session->read('codigo');
            $grupos_habilitados = array(1, 17);
            if ($this->Asociation->Proyect->Resolution->find('count', array('conditions' => array('Resolution.proyect_id' => $proyect_id))) < 1 or in_array($this->Auth->user('group_id'), $grupos_habilitados)) {
                $this->set('permitir', true);
            } else {
                $resolution_id = $this->Asociation->Proyect->Resolution->field('id', array('Resolution.proyect_id' => $proyect_id, 'Resolution.tipo' => 'ADJUDICACIÓN'));
                $rutaDocumento = APP . "webroot" . "/" . "files/resoluciones/SoporteResolucion-" . $codigo . "-" . $resolution_id . ".pdf";
                if (file_exists("../webroot/files/resoluciones/SoporteResolucion-" . $codigo . "-" . $resolution_id . ".pdf")) {
                    if (in_array($this->Auth->user('group_id'), $grupos_habilitados)) {
                        $this->set('permitir', true);
                    } else {
                        $this->set('permitir', false);
                    }
                } else {
                    $this->set('permitir', true);
                }
            }
        } else {
            $this->Session->setFlash('No ha seleccionado proyecto', 'flash');
            $this->redirect(array('controller' => 'pages', 'action' => 'display'));
        }
    }

    public function delete($id) {
        if ($this->Asociation->delete($id)) {
            $this->Session->setFlash('Asociación eliminada correctamente', 'flash');
            $this->redirect(array('controller' => 'Asociations', 'action' => 'index'));
        } else {
            $this->Session->setFlash('Error borrando datos', 'flash');
            $this->redirect(array('controller' => 'pages', 'action' => 'display'));
        }
    }

}

?>