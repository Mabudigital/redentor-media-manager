<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AudioRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AudioCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AudioCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Audio::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/audio');
        CRUD::setEntityNameStrings('audio', 'audio');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('title');
        CRUD::column('description');
        CRUD::column('program');
        CRUD::column('event');
        CRUD::column('artist');
        CRUD::column('date');
        //CRUD::column('url');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(AudioRequest::class);

        CRUD::field('title');
        CRUD::field('description');
        CRUD::field('program');
        CRUD::field('event');
        CRUD::field('artist');
        $this->crud->addField(
            [   // date_picker
            'name'  => 'date',
            'type'  => 'date_picker',
            'label' => 'Date',

            // optional:
            'date_picker_options' => [
               'todayBtn' => 'linked',
               'format'   => 'dd-mm-yyyy',
               'language' => 'en'
            ],
         ],
        );
        $this->crud->addField([
            'name'      => 'url',
            'label'     => 'Audio',
            'type'      => 'upload',
            'upload'    => true,
            //'disk'      => 'uploads',
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb',false);

        CRUD::column('title');
        CRUD::column('description');
        CRUD::column('program');
        CRUD::column('event');
        CRUD::column('artist');
        CRUD::column('date');
        CRUD::addColumn([
            'name' => 'url',
            'label' => 'Audio',
            'type'  => 'model_function',
            'function_name' => 'audioPlayer',
    ]);

    }
}
