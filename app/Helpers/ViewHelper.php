<?php namespace App\Helpers;

/*------------------------------------------------------
| Helps to generate common view elements easier.
--------------------------------------------------------*/

use Illuminate\Html\FormBuilder;
use Illuminate\Html\FormFacade as Form;
use Illuminate\Html\HtmlFacade as Html;
use App\FilatovaElena\BugsFacade as Bugs;

class ViewHelper {

    protected $defaults = [
        'element_width' => 4,
        'label_width' => 2
    ];

    /**
     * @param $elements array of elements
     * @return  string  html string of a group
     */
    public function formGroup(array $elements, $errors)
    {
        $html = '<div class="form-group">';

        foreach($elements as $element)
        {
            switch($element['type'])
            {
                case 'text' : $html = $html.$this->textElement($element, $errors); break;
                case 'textarea' : $html = $html.$this->textareaElement($element, $errors); break;
                case 'select' : $html = $html.$this->selectElement($element, $errors); break;
                case 'stateSelect' : $html = $html.$this->stateSelectElement($element, $errors); break;
                case 'date' : $html = $html.$this->dateElement($element, $errors); break;
                case 'time' : $html = $html.$this->timeElement($element, $errors); break;
                case 'view' : $html = $html.$this->viewElement($element, $errors); break;
            }
        }

        $html = $html.'</div>';

        return $html;
    }

    /**
     * @param array $element
     *      ['name' => 'first_name',
     *       'label' => 'First Name',
     *       'placeholder' => 'Enter First Name',
     *       'element_width' => 4,
     *       'label_width' => 2
     *       ]
     * @return  string  html string
     */
    protected function textElement(array $element, $errors)
    {
        $html = '<span class="'.$this->errorClass($errors, $element['name']).'">';

        if (array_key_exists('label', $element))
        {
            $html = $html.$this->label($element);
        }

        $html = $html.$this->elementWrapperOpen($element);

        $html = $html.Form::text(
                $element['name'],
                $value = $this->value($element) ,
                [
                    'class' => 'form-control',
                    'placeholder' => array_key_exists('placeholder', $element)? $element['placeholder']: (array_key_exists('label', $element)?$element['label']:'' )
                ]);

        $html = $html.$this->elementWrapperClose($element, $errors);

        $html = $html.'</span>';

        return $html;
    }

    /**
     * @param array $element
     *      ['name' => 'first_name',
     *       'label' => 'First Name',
     *       'placeholder' => 'Enter First Name',
     *       'element_width' => 4,
     *       'label_width' => 2
     *       ]
     * @return  string  html string
     */
    protected function textareaElement(array $element, $errors)
    {
        $html = '<span class="'.$this->errorClass($errors, $element['name']).'">';

        if (array_key_exists('label', $element))
        {
            $html = $html.$this->label($element);
        }

        $html = $html.$this->elementWrapperOpen($element);

        $html = $html.Form::textarea(
                $element['name'],
                $value = $this->value($element) ,
                [
                    'class' => 'form-control',
                    'placeholder' => array_key_exists('placeholder', $element)? $element['placeholder']: ''
                ]);

        $html = $html.$this->elementWrapperClose($element, $errors);

        $html = $html.'</span>';

        return $html;
    }

    /**
     * @param array $element
     *      ['name' => 'first_name',
     *       'label' => 'First Name',
     *       'element_width' => 4,
     *       'label_width' => 2,
     *       'list' => []
     *       'list_selected' => 'list_selected'
     *       ]
     * @return  string  html string
     */
    protected function selectElement(array $element, $errors)
    {
        $html = '<span class="'.$this->errorClass($errors, $element['name']).'">';

        if (array_key_exists('label', $element))
        {
            $html = $html.$this->label($element);
        }

        $html = $html.$this->elementWrapperOpen($element);

        $html = $html.Form::select(
                $element['name'],
                $element['list'],
                $this->value($element),
                ['class' => 'form-control']);

        $html = $html.$this->elementWrapperClose($element, $errors);

        $html = $html.'</span>';

        return $html;
    }

    /**
     * @param array $element
     *      ['name' => 'first_name',
     *       'label' => 'First Name',
     *       'element_width' => 4,
     *       'label_width' => 2,
     *       'list' => []
     *       'list_selected' => 'list_selected'
     *       ]
     * @return  string  html string
     */
    protected function stateSelectElement(array $element, $errors)
    {
        $html = '<span class="'.$this->errorClass($errors, $element['name']).'">';

        if (array_key_exists('label', $element))
        {
            $html = $html.$this->label($element);
        }

        $html = $html.$this->elementWrapperOpen($element);

        $html = $html.Form::select(
                $element['name'],
                [
                    ' ' => ' ',
                    'AL' => 'Alabama',
                    'AK' => 'Alaska',
                    'AZ' => 'Arizona',
                    'AR' => 'Arkansas',
                    'CA' => 'California',
                    'CO' => 'Colorado',
                    'CT' => 'Connecticut',
                    'DE' => 'Delaware',
                    'FL' => 'Florida',
                    'GA' => 'Georgia',
                    'HI' => 'Hawaii',
                    'ID' => 'Idaho',
                    'IL' => 'Illinois',
                    'IN' => 'Indiana',
                    'IA' => 'Iowa',
                    'KS' => 'Kansas',
                    'KY' => 'Kentucky',
                    'LA' => 'Louisiana',
                    'ME' => 'Maine',
                    'MD' => 'Maryland',
                    'MA' => 'Massachusetts',
                    'MI' => 'Michigan',
                    'MN' => 'Minnesota',
                    'MS' => 'Mississippi',
                    'MO' => 'Missouri',
                    'MT' => 'Montana',
                    'NE' => 'Nebraska',
                    'NV' => 'Nevada',
                    'NH' => 'New Hampshire',
                    'NJ' => 'New Jersey',
                    'NM' => 'New Mexico',
                    'NY' => 'New York',
                    'NC' => 'North Carolina',
                    'ND' => 'North Dakota',
                    'OH' => 'Ohio',
                    'OK' => 'Oklahoma',
                    'OR' => 'Oregon',
                    'PA' => 'Pennsylvania',
                    'RI' => 'Rhode Island',
                    'SC' => 'South Carolina',
                    'SD' => 'South Dakota',
                    'TN' => 'Tennessee',
                    'TX' => 'Texas',
                    'UT' => 'Utah',
                    'VE' => 'Vermont',
                    'VA' => 'Virginia',
                    'WA' => 'Washington',
                    'WV' => 'West Virginia',
                    'WI' => 'Wisconsin',
                    'WY' => 'Wyoming'],
                $this->value($element),
                ['class' => 'form-control']);

        $html = $html.$this->elementWrapperClose($element, $errors);

        $html = $html.'</span>';

        return $html;
    }

    /**
     * @param array $element
     *      ['name' => 'first_name',
     *       'label' => 'First Name',
     *       'element_width' => 4,
     *       'label_width' => 2,
     *       'list' => []
     *       'list_selected' => 'list_selected'
     *       ]
     * @return  string  html string
     */
    protected function dateElement(array $element, $errors)
    {
        $html = '<span class="'.$this->errorClass($errors, $element['name']).'">';

        if (array_key_exists('label', $element))
        {
            $html = $html.$this->label($element);
        }

        $html = $html.$this->elementDateWrapperOpen($element);

        $html = $html.Form::text(
                $element['name'],
                $value = $this->value($element) ,
                [
                    'class' => 'form-control',
                    'placeholder' => array_key_exists('placeholder', $element)? $element['placeholder']: ''
                ]);

        $html = $html.'<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>';

        $html = $html.$this->elementWrapperClose($element, $errors);

        $html = $html.'</span>';

        return $html;
    }

    /**
     * @param array $element
     *      ['name' => 'first_name',
     *       'label' => 'First Name',
     *       'element_width' => 4,
     *       'label_width' => 2,
     *       'list' => []
     *       'list_selected' => 'list_selected'
     *       ]
     * @return  string  html string
     */
    protected function timeElement(array $element, $errors)
    {
        $html = '<span class="'.$this->errorClass($errors, $element['name']).'">';

        if (array_key_exists('label', $element))
        {
            $html = $html.$this->label($element);
        }

        $html = $html.$this->elementTimeWrapperOpen($element);

        $html = $html.Form::text(
                $element['name'],
                $value = $this->value($element) ,
                [
                    'class' => 'form-control',
                    'placeholder' => array_key_exists('placeholder', $element)? $element['placeholder']: ''
                ]);

        $html = $html.'<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>';

        $html = $html.$this->elementWrapperClose($element, $errors);

        $html = $html.'</span>';

        return $html;
    }

    /**
     * @param array $element
     *      ['name' => 'first_name',
     *       'label' => 'First Name',
     *       'element_width' => 4,
     *       'label_width' => 2
     *       ]
     * @return  string  html string
     */
    protected function viewElement(array $element, $errors)
    {
        $html = '<span class="'.$this->errorClass($errors, $element['name']).'">';

        if (array_key_exists('label', $element))
        {
            $html = $html.$this->label($element);
        }

        $html = $html.$this->elementWrapperOpen($element);

        if (array_key_exists('link', $element))
        {
            $html = $html.'<a href="'.$element['link'].'">';
        }

        $html = $html.'<span class="form-control-view">'.$this->value($element).'</span>';

        if (array_key_exists('link', $element))
        {
            $html = $html.'</a>';
        }

        $html = $html.$this->elementWrapperClose($element, $errors);

        $html = $html.'</span>';

        return $html;
    }

    protected function label($element)
    {
        $width = array_key_exists('label_width', $element)?$element['label_width']:$this->defaults['label_width'];
        return Form::label(
            $element['name'],
            $element['label'],
            [
                'class' => 'col-lg-'. $width .' control-label'
            ]);
    }

    protected function value($element)
    {
        // if value is set
        if (array_key_exists('value', $element)) {

            return $element['value'];
        }

        // if value is set through url parameters
        else if (array_key_exists('params', $element)) {

            $params = $element['params'];
            if (array_key_exists($element['name'], $params))
            {
                return $params[$element['name']];
            }
        }
        else if ($element['type'] == 'select' || $element['type'] == 'selectState') {

            return null;
        }
        else {
            return '';
        }
    }

    protected function elementWrapperOpen($element)
    {
        $width = array_key_exists('element_width', $element)? $element['element_width']: $this->defaults['element_width'];
        return '<div class="col-lg-'.$width.'">';
    }

    protected function elementTimeWrapperOpen($element)
    {
        $width = array_key_exists('element_width', $element)? $element['element_width']: $this->defaults['element_width'];
        return '<div class="col-lg-'.$width.' input-group date timepicker">';
    }

    protected function elementDateWrapperOpen($element)
    {
        $width = array_key_exists('element_width', $element)? $element['element_width']: $this->defaults['element_width'];
        return '<div class="col-lg-'.$width.' input-group date datepicker">';
    }

    protected  function elementWrapperClose($element, $errors)
    {
        return $this->errorElement($element, $errors).'</div>';
    }

    protected function errorClass($errors, $name)
    {
        return $errors->first($name, ' has-error');
    }

    protected function errorElement($element, $errors)
    {
        $name = $element['name'];

        return $errors->first($name, '<span class="help-block">:message</span>');
    }

    public function viewButton($route, $id)
    {
        return '<a title="View" class="btn btn-small btn-info" href="'.route($route, $id).'"><span class="glyphicon glyphicon-eye-open"></span></a>';
    }

    public function editButton($route, $id)
    {
        return '<a title="Edit" class="btn btn-small btn-info" href="'.route($route, $id).'"><span class="glyphicon glyphicon-pencil"></span></a>';
    }

    public function deleteButton($route, $id)
    {
        return '<span class="btn btn-small btn-info">'.
                    Form::open(array('route' => array($route, $id), 'method' => 'delete')).
                        '<button class="glyphicon glyphicon-trash" type="submit" ></button>'.
                    Form::close().
                '</span>';
    }

    public function removeButton($route, $id1, $id2)
    {
        return '<span class="btn btn-small btn-info">'.
        Form::open(array('route' => array($route, $id1, $id2), 'method' => 'delete')).
        '<button class="glyphicon glyphicon-remove" type="submit" ></button>'.
        Form::close().
        '</span>';
    }

    public function submitButton($text)
    {
        return '<div class="form-group"><span><div class="col-lg-'.$this->defaults['label_width'].'"></div><div class="col-lg-'.$this->defaults['element_width'].'">'.
        Form::submit($text, array('class' => 'btn btn-small btn-info')).
        '</div></span></div>';
    }

    public function sectionStart($class, $title)
    {
        return
            '<section class="panel '.$class.'">'.
            '<div class="panel-heading">'.
                '<h3 class="panel-title">'.$title.'</h3>'.
            '</div>'.
            '<div class="panel-body">';
    }

    public function sectionEnd()
    {
        return '</div></section>';
    }

    /**
     * Create a list of standard bootstrap tabs
     * @param array $tabs
     */
    public function tabs(array $tabs)
    {
        $html = '<ul class="nav nav-tabs nav-tabs-blue">';

        foreach ($tabs as $tab)
        {
            $html = $html.'<li '.($tab['active']? 'class="active"': '').'>'.
                '<a href="#'.$tab['id'].'" data-toggle="tab">'.$tab['label'].'<i class="fa"></i></a></li>';
        }
        $html = $html.'</ul><div class="tab-content">';

        foreach($tabs as $tab)
        {
            $html = $html.$this->tabStart($tab['id'], $tab['create_route'], $tab['active']);

            $html = $html.$tab['content'];

            $html = $html.$this->tabEnd();
        }

        $html = $html.'</div>';

        return $html;
    }

    public function tabStart($tab, $create_route, $active)
    {
        return '<div class="tab-pane '.($active?'active':'').'" id="'.$tab.'">'.
                '<div class="pull-right"><a href="'.$create_route.'" class="btn btn-small btn-info"><span class="glyphicon glyphicon-plus"></span> Create</a>
                 </div><br/><br/>';
    }

    public function tabEnd()
    {
        return '</div>';
    }

    public function recordList($name, $records, $columns, $buttons = ['show', 'edit', 'destroy'])
    {
        $html = '<table class="table table-striped object-list"><thead><tr>';

        foreach($columns as $key => $function)
        {
            $html = $html.'<th>'.$key.'</th>';
        }

        foreach($buttons as $button)
        {
            if ($button == 'show') {
                $html = $html.'<th>View</th>';
            }
            else if ($button == 'edit'){
                $html = $html.'<th>Edit</th>';
            }
            else if ($button == 'destroy') {
                $html = $html.'<th>Delete</th>';
            }
        }

        $html = $html.'</thead></tr>';

        foreach($records as $record)
        {
            $html = $html.'<tr>';

            foreach($columns as $key => $function)
            {
                $html = $html.'<td>'.$function($record).'</td>';
            }

            foreach($buttons as $button)
            {
                if ($button == 'show') {
                    $html = $html.'<td>'.$this->viewButton($name.'.show', $record->id).'</td>';
                }
                else if ($button == 'edit'){
                    $html = $html.'<td>'.$this->editButton($name.'.edit', $record->id).'</td>';
                }
                else if ($button == 'destroy') {
                    $html = $html.'<td>'.$this->deleteButton($name.'.destroy', $record->id).'</td>';
                }
            }
            $html = $html.'</tr>';
        }



        $html = $html.'</tbody></table>';

        return $html;
    }

    public function attachedRecordList($parent, $attached, $parent_id, $records, $columns)
    {
        // records list
        $html = '<table class="table table-striped object-list"><thead><tr>';

        foreach($columns as $key => $function)
        {
            $html = $html.'<th>'.$key.'</th>';
        }

        $html = $html.'<th>View</th><th>Edit</th><th>Rem</th><th>Delete</th></thead><tbody>';

        foreach($records as $record)
        {
            $html = $html.'<tr>';

            foreach($columns as $key => $function)
            {
                $html = $html.'<td>'.$function($record).'</td>';
            }

            $html = $html.'<td>'.$this->viewButton($attached.'.show', $record->id).'</td>';
            $html = $html.'<td>'.$this->editButton($attached.'.edit', $record->id).'</td>';
            $html = $html.'<td>'.$this->removeButton($parent.'.'.$attached.'.detach', $parent_id, $record->id).'</td>';
            $html = $html.'<td>'.$this->deleteButton($attached.'.destroy', $record->id).'</td>';
            $html = $html.'</tr>';
        }



        $html = $html.'</tbody></table>';

        return $html;
    }

    public function bug($id, $look = 'bug_brown')
    {
        $content = '';
        if(Bugs::isAlive($id)) {

            $image = Html::image('assets/images/bugs/'.$look.'.png');
            $content = '<span class="bug">'.$image.'</span>';
        }
        else {

            $content = '';
        }
        return '<div class="bug_wrapper" id="'.$id.'">'.$content.'</div>';
    }

};