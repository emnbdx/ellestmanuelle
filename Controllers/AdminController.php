<?php

namespace Controllers {

    use \Config;

    class AdminController
    {
        private $repository;
        private $fileUploader;

        public function __construct($repository, $fileUploader)
        {
            $this->repository = $repository;
            $this->fileUploader = $fileUploader;
        }

        public function index()
        {
            return ['view', 'index', null];
        }

        public function login()
        {
            $data = '';
            if (isset($_REQUEST['submit']) && $_REQUEST['submit'] != "") {
                extract($_REQUEST);
                
                if(Config::$ADMIN_USER == $login && Config::$ADMIN_PASSWORD == $password) {
                    $_SESSION["loggedin"] = true;
                    header('location: /admin');
                    exit();
                } else {
                    $_SESSION['error'] = 'Erreur de connexion';
                    header('location: /admin/login');
                    exit();
                }
            }
            
            return ['view', 'login', $data];
        }

        public function logout()
        {
            unset($_SESSION["loggedin"]);
            header('location: /admin/login');
            exit();
        }

        public function creationList()
        {
            $data = $this->repository->getAllRecords('creation', '*', '', 'ORDER BY id DESC');
            return ['view', 'creation/index', $data];
        }

        public function creationForm($params)
        {
            $mode = isset($params['id']) && $params['id'] > 0 ? 'EDIT' : 'ADD';
            $themes = $this->repository->getAllRecords('theme', '*', '', 'ORDER BY name');
            $techniques = $this->repository->getAllRecords('technique', '*', '', 'ORDER BY name');

            $data = [
                'mode' => $mode,
                'themes' => $themes,
                'techniques' => $techniques,
            ];

            if ($mode == 'EDIT') {
                $data['creation'] = $this->repository->getAllRecords('creation', '*', ' AND id="' . $params['id'] . '"')[0];
                $data['currentTheme'] = $this->repository->getAllRecords('tag', '*', ' AND id_theme is not null AND id_creation="' . $params['id'] . '"');
                $data['currentTechnique'] = $this->repository->getAllRecords('tag', '*', ' AND id_technique is not null AND id_creation="' . $params['id'] . '"');
            } else {
                $data['creation'] = [];
                $data['currentTheme'] = [];
                $data['currentTechnique'] = [];
            }

            return ['view', 'creation/add-update', $data];
        }

        public function addOrUpdateCreation()
        {
            $editId = 0;
            if (isset($_REQUEST['submit']) && $_REQUEST['submit'] != "") {
                extract($_REQUEST);

                if (isset($_REQUEST['editId'])) {
                    $editId = $_REQUEST['editId'];
                    $creation = $this->repository->getAllRecords('creation', '*', ' AND id="' . $editId . '"')[0];
                }

                if ($name == "") {
                    $_SESSION['error'] = 'Merci de fournir un nom';
                    header('location: /admin/creation/' . $editId . '/update');
                    exit;
                } else if ($description == "") {
                    $_SESSION['error'] = 'Merci de fournir une description';
                    header('location: /admin/creation/' . $editId . '/update');
                    exit;
                }
                if($editId == 0 && $_FILES["picture"]["name"] == "") {
                    $_SESSION['error'] = 'Merci de fournir une image';
                    header('location: /admin/creation/add');
                    exit;
                }

                if ($_FILES["picture"]["name"] != "") {
                    $this->fileUploader->upload($_FILES["picture"]);
                }

                if ($_FILES["picture2"]["name"] != "") {
                    $this->fileUploader->upload($_FILES["picture2"]);
                }

                $data = array(
                    'name' => $name,
                    'description' => $description,
                    'picture' => $_FILES["picture"]["name"] == "" ? $creation['picture'] : $_FILES["picture"]["name"],
                    'picture2' => $_FILES["picture2"]["name"] == "" ? $creation['picture2'] : $_FILES["picture2"]["name"],
                );

                if ($editId > 0) {
                    $this->repository->delete('tag', array('id_creation' => $editId));
                    $this->repository->update('creation', $data, array('id' => $editId));
                    $_SESSION['success'] = 'Création mise à jour';
                } else {
                    $this->repository->insert('creation', $data);
                    $editId = $this->repository->lastInsertId('creation');
                    $_SESSION['success'] = 'Création ajoutée';
                }

                if ($theme != "") {
                    $data = array(
                        'id_creation' => $editId,
                        'id_theme' => $theme,
                    );
                    $this->repository->insert('tag', $data);
                }

                if ($technique != "") {
                    $data = array(
                        'id_creation' => $editId,
                        'id_technique' => $technique,
                    );
                    $this->repository->insert('tag', $data);
                }
                
                header('location: /admin/creations');
                exit;
            }
        }

        public function deleteCreation($params)
        {
            if (isset($params['id']) && $params['id'] != "") {
                $creation = $this->repository->getAllRecords('creation', '*', ' AND id="' . $params['id'] . '"')[0];
                if ($creation["picture"])
                    unlink(Config::$UPLOADFOLDER . $creation["picture"]);
                if ($creation["picture2"])
                    unlink(Config::$UPLOADFOLDER . $creation["picture2"]);

                $this->repository->delete('tag', array('id_creation' => $params['id']));
                $this->repository->delete('creation', array('id' => $params['id']));
                $_SESSION['success'] = 'Création supprimée';
                header('location: /admin/creations');
                exit;
            }
        }

        public function documentList()
        {
            $data = $this->repository->getAllRecords('document', '*', '', 'ORDER BY id DESC');
            return ['view', 'document/index', $data];
        }

        public function documentForm()
        {
            return ['view', 'document/add', null];
        }

        public function addDocument()
        {
            if (isset($_REQUEST['submit']) && $_REQUEST['submit'] != "") {
                extract($_REQUEST);
                if ($_FILES["document"]["name"] == "") {
                    $_SESSION['error'] = 'Merci de fournir un nom';
                    header('location: /admin/documents');
                    exit;
                }

                if ($_FILES["document"]["name"] != "") {
                    $uploadError = $this->fileUploader->upload($_FILES["document"]);
                    if ($uploadError !== "") {
                        $_SESSION['error'] = $uploadError;
                        header('location: /admin/documents');
                        exit;
                    }
                }

                $data = array(
                    'name' => $_FILES["document"]["name"]
                );

                $this->repository->insert('document', $data);

                $_SESSION['success'] = 'Document ajouté';
                header('location: /admin/documents');
                exit;
            }
        }

        public function deleteDocument($params)
        {
            if (isset($params['id']) && $params['id'] != "") {
                $document = $this->repository->getAllRecords('document', '*', ' AND id="' . $params['id'] . '"')[0];
                unlink(Config::$UPLOADFOLDER . $document["name"]);

                $this->repository->delete('document', array('id' => $params['id']));
                $_SESSION['success'] = 'Document supprimé';
                header('location: /admin/documents');
                exit;
            }
        }

        public function pageList()
        {
            $data = $this->repository->getAllRecords('page', '*', '', 'ORDER BY id DESC');
            return ['view', 'page/index', $data];
        }

        public function pageForm($params)
        {
            $data = $this->repository->getAllRecords('page', '*', ' AND id="'.$params['id'].'"')[0];

            return ['view', 'page/update', $data];
        }

        public function updatePage()
        {
            if (isset($_REQUEST['submit']) && $_REQUEST['submit'] != "") {
                extract($_REQUEST);
                if ($content == "")
                {
                    $_SESSION['error'] = 'Le contenu ne peut pas être vide';
                    header('location: /admin/page/' . $editId . '/update');
                    exit;
                }

                $data = array(
                    'content'=>$content
                );
                
                $this->repository->update('page', $data, array('id' => $editId));

                $_SESSION['success'] = 'Page mise à jour';
                header('location: /admin/pages');
                exit;
            }
        }

        public function techniqueList()
        {
            $data = $this->repository->getAllRecords('technique', '*', '', 'ORDER BY id DESC');
            return ['view', 'technique/index', $data];
        }

        public function techniqueForm($params)
        {
            $mode = isset($params['id']) && $params['id'] > 0 ? 'EDIT' : 'ADD';
            $technique = $this->repository->getAllRecords('technique', '*', ' AND id="' . $params['id'] . '"')[0];

            $data = [
                'mode' => $mode,
                'technique' => $technique,
            ];
            return ['view', 'technique/add-update', $data];
        }

        public function addOrUpdateTechnique()
        {
            $editId = 0;
            if (isset($_REQUEST['submit']) && $_REQUEST['submit'] != "") {

                if (isset($_REQUEST['editId'])) {
                    $editId = $_REQUEST['editId'];
                }

                extract($_REQUEST);
                if ($name == "") {
                    $_SESSION['error'] = 'Merci de fournir un nom';
                    header('location: /admin/technique/' . $editId . '/update');
                    exit;
                } else if ($kind == "") {
                    $_SESSION['error'] = 'Merci de fournir un type';
                    header('location: /admin/technique/' . $editId . '/update');
                    exit;
                }

                $data = array(
                    'name' => $name,
                    'kind' => $kind,
                    'position' => $position
                );

                if ($editId > 0) {
                    $this->repository->update('technique', $data, array('id' => $editId));
                    $_SESSION['success'] = 'Technique mise à jour';
                } else {
                    $this->repository->insert('technique', $data);
                    $_SESSION['success'] = 'Technique ajoutée';
                }
                
                header('location: /admin/techniques');
                exit;
            }
        }

        public function deleteTechnique($params)
        {
            if (isset($params['id']) && $params['id'] != "") {
                $this->repository->delete('technique', array('id' => $params['id']));
                $_SESSION['success'] = 'Technique supprimée';
                header('location: /admin/techniques');
                exit;
            }
        }

        public function themeList()
        {
            $data = $this->repository->getAllRecords('theme', '*', '', 'ORDER BY id DESC');
            return ['view', 'theme/index', $data];
        }

        public function themeForm($params)
        {
            $mode = isset($params['id']) && $params['id'] > 0 ? 'EDIT' : 'ADD';
            $theme = $this->repository->getAllRecords('theme', '*', ' AND id="' . $params['id'] . '"')[0];

            $data = [
                'mode' => $mode,
                'theme' => $theme,
            ];
            return ['view', 'theme/add-update', $data];
        }

        public function addOrUpdateTheme()
        {
            $editId = 0;
            if (isset($_REQUEST['submit']) && $_REQUEST['submit'] != "") {

                if (isset($_REQUEST['editId'])) {
                    $editId = $_REQUEST['editId'];
                }

                extract($_REQUEST);
                if ($name == "") {
                    $_SESSION['error'] = 'Merci de fournir un nom';
                    header('location: /admin/theme/' . $editId . '/update');
                    exit;
                }

                $data = array(
                    'name'=>$name,
                    'position'=>$position
                );

                if ($editId > 0) {
                    $this->repository->update('theme', $data, array('id' => $editId));
                    $_SESSION['success'] = 'Theme mis à jour';
                } else {
                    $this->repository->insert('theme', $data);
                    $_SESSION['success'] = 'Theme ajouté';
                }

                header('location: /admin/themes');
                exit;
            }
        }

        public function deleteTheme($params)
        {
            if (isset($params['id']) && $params['id'] != "") {
                $this->repository->delete('theme', array('id' => $params['id']));
                $_SESSION['success'] = 'Theme supprimé';
                header('location: /admin/themes');
                exit;
            }
        }
    }
}
