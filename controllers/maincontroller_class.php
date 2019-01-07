<?php

class MainController extends AbstractController
{
    protected $title;
    protected $meta_desc;
    protected $meta_keywords;
    
    public function __construct() {
        parent::__construct(new View(DIR_TMPL));
    }
    
    public function action404() { //формирование страницы 404
        parent::action404();
        $this->title = 'Page not found - 404'; //формирование заголовков страницы
        $this->meta_desc = 'We can\'t found this page.';
        $this->meta_keywords = 'page not found, 404';
        
        $content = $this->view->render('404', [], true);
        $this->render($content);
    }

    public function actionError($message) { //формирование страницы ошибки
        $this->title = 'Some error';
        $this->meta_desc = 'Some error';
        $this->meta_keywords = 'error';

        $content = $this->view->render('error', ['message' => $message], true);
        $this->render($content);
    }
    
    public function actionIndex() { //вывод главной страницы
        $this->title = 'Main page';
        $this->meta_desc = 'Page, where you can upload your cvs files';
        $this->meta_keywords = 'cvs, main page';
        
        $content = $this->view->render('index', [], true);
        $this->render($content);
    }
    
    public function actionResults() { //вывод страницы с результатами
        $this->title = 'Results';
        $this->meta_desc = 'Page, where you can see the result';
        $this->meta_keywords = 'cvs, result page';
        $userDate = new UserDate();

        $content = $this->view->render('results', ['data' => $userDate->select()], true);
        $this->render($content);
    }

    public function actionImport() { //импорт cvs-файлов
        if(!$_FILES)
            header("Location:/");

        $userDate = new UserDate();

        try {
            if (Validator::validate($_FILES['file']['name'], $_FILES['file']['size'])) {
                $result = CSV::read($_FILES['file']['tmp_name'], 1000, ",");
                if (!$result) {
                    header("Location:/");
                    return;
                }
                $uids = $userDate->select('UID');
                foreach ($result as $key => $val) {
                    if (in_array($val[0], $uids)) {
                        $userDate->update($val, $val[0]); //если данные в таблице уже есть - обновить
                    } else {
                        $userDate->insert($val);
                    }
                }
                Session::set('message_success', 'Successfully done');
            }
            header("Location:/");
        } catch (Exception $e) {
            new CustomError($e->getMessage());
        }
    }

    public function actionExport() { //экспорт cvs-файлов
        $userDate = new UserDate();
        $result = $userDate->select();

        if (empty($result)) {
            Session::set('message_error', 'Nothing to export!');
            header("Location:/results");
        } else {
            CSV::write($userDate->select());
            header('Content-Disposition: attachment; filename=results.csv');
            readfile('output/results.csv');
        }
    }

    public function actionDelete() { //очистка данных в таблице
        $userDate = new UserDate();
        $userDate->delete();
        header("Location:/");
    }
    
    protected function render($content) { //передача переменных в шаблон
        $params = [];
        $params['title'] = $this->title;
        $params['meta_desc'] = $this->meta_desc;
        $params['meta_keywords'] = $this->meta_keywords;
        $params['content'] = $content;

        $params['message_success'] = Session::get('message_success');
        $params['message_error'] = Session::get('message_error');

        $this->view->render(MAIN_LAYOUT, $params);
        Session::clear();
    }
}
