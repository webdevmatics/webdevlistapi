<?php

namespace Tests\Feature;

use App\Task;
use App\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    public function setUp():void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();

        $this->actingAs($this->user, 'api');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_task()
    {
        
        $formData =[
            'title'=>'first task',   
            'description'=>'first task description',
            'due'=> Carbon::parse('next friday')
        ];


        $this->json('POST',route('tasks.store'),$formData)
             ->assertStatus(201)
             ->assertJson(['data'=>$formData])
             ;   

    }

    public function test_can_update_task()
    {
        $task = factory(Task::class)->make();

        $this->user->tasks()->save($task);

        $updatedData = [
            'title' => 'second task',
            'description' => 'first task description',
            'due' => Carbon::parse('next friday')
        ];


        $this->json('PUT', route('tasks.update', $task->id), $updatedData)
            ->assertStatus(200)
            ->assertJson(['data' => $updatedData]);
    }

    public function test_can_show_task()
    {

        $task= factory(Task::class)->make();

        $this->user->tasks()->save($task);
        

        $this->get(route('tasks.show', $task->id))->assertStatus(200);
    }
   
    public function test_can_delete_task()
    {

        $task= factory(Task::class)->make();

        $this->user->tasks()->save($task);
        

        $this->delete(route('tasks.destroy', $task->id))->assertStatus(200);
    }

    public function test_can_list_tasks()
    {
        $tasks = factory(Task::class, 3)->make();

        $this->user->tasks()->saveMany($tasks);

        $this->get(route('tasks.index'))
        ->assertJson(['data'=> $tasks->toArray()])
        ->assertJsonStructure([
            'data'=>['*'=>['title','description','due','creator']],
            'links',
            'meta'
        ])
        ->assertStatus(200);
    }
}
