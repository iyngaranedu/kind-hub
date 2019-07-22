<?php

namespace Tests\Feature\Http\Controllers\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StudentControllerTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;
    const API_REQUEST_URL = "/api/students";

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    protected function authenticate()
    {
        $user = User::create(
            [
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('secret1234'),
            ]
        );
        $token = JWTAuth::fromUser($user);
        return $token;
    }

    /**
     * @test 
     */
    public function only_logged_in_users_can_see_the_student_list()
    {
        $response = $this->get(self::API_REQUEST_URL);
        $response->assertStatus(401);
    }

    /**
     * @test 
     */
    public function authenticated_users_can_see_the_student_list()
    {
        // Get token
        $token = $this->authenticate();
        $response = $this->withHeaders(
            [
            'Authorization' => 'Bearer ' . $token,
            ]
        )->json('GET', self::API_REQUEST_URL);

        $response->assertStatus(200);
    }

    /**
     * @test 
     */
    public function authenticated_users_can_get_a_student()
    {
        // Get token
        $token = $this->authenticate();
        $response = $this->withHeaders(
            [
            'Authorization' => 'Bearer ' . $token,
            ]
        )->json('GET', self::API_REQUEST_URL."/8");
        $response->assertStatus(200)
            ->assertJsonStructure(
                [
                'student' => [
                    'first_name',
                    'last_name',
                    'gender',
                    'tbl_class_room_id',
                    'updated_at',
                    'created_at',
                    'id'
                ]
                ]
            );
    }

    /**
     * @test 
     */
    public function authenticated_users_can_create_a_student()
    {
        // Get token
        $token = $this->authenticate();
        $response = $this->withHeaders(
            [
            'Authorization' => 'Bearer ' . $token,
            ]
        )->json(
            'POST', self::API_REQUEST_URL, [
                'first_name' => 'Iyngaran',
                'last_name' => 'Iyathurai',
                'gender' => 'M',
                'class_room_id' => 1
                ]
        );
        $response->assertStatus(200)
            ->assertJsonStructure(
                [
                'student' => [
                    'first_name',
                    'last_name',
                    'gender',
                    'tbl_class_room_id',
                    'updated_at',
                    'created_at',
                    'id'
                ]
                ]
            );
    }

    /**
     * @test 
     */
    public function first_name_required_to_create_a_student()
    {
        // Get token
        $token = $this->authenticate();
        $response = $this->withHeaders(
            [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json'
            ]
        )->json(
            'POST', self::API_REQUEST_URL, [
                'first_name' => 'Iyngaran',
                //'last_name' => 'Iyathurai',
                'gender' => 'M',
                'class_room_id' => 1
                ]
        );
        $response->assertStatus(422)
            ->assertJsonStructure(
                [
                'errors' => [
                    'last_name'
                ]
                ]
            );
    }

    /**
     * @test 
     */
    public function authenticated_users_can_update_a_student()
    {
        // Get token
        $token = $this->authenticate();
        $response = $this->withHeaders(
            [
            'Authorization' => 'Bearer ' . $token,
            ]
        )->json(
            'PUT', self::API_REQUEST_URL."/5", [
                'first_name' => 'Iyngaran K',
                'last_name' => 'Iyathurai',
                'gender' => 'M',
                'class_room_id' => 1
                ]
        );
        $response->assertStatus(200)
            ->assertJsonStructure(
                [
                'student' => [
                    'first_name',
                    'last_name',
                    'gender',
                    'tbl_class_room_id',
                    'updated_at',
                    'created_at',
                    'id'
                ]
                ]
            );
    }

    /**
     * @test 
     */
    public function update_a_non_existing_student()
    {
        // Get token
        $token = $this->authenticate();
        $response = $this->withHeaders(
            [
            'Authorization' => 'Bearer ' . $token,
            ]
        )->json(
            'PUT', self::API_REQUEST_URL."/5000000", [
                'first_name' => 'Iyngaran K',
                'last_name' => 'Iyathurai',
                'gender' => 'M',
                'class_room_id' => 1
                ]
        );
        $response->assertStatus(404);
    }

    /**
     * @test 
     */
    public function authenticated_users_can_delete_a_student()
    {
        // Get token
        $token = $this->authenticate();
        $response = $this->withHeaders(
            [
            'Authorization' => 'Bearer ' . $token,
            ]
        )->json('DELETE', self::API_REQUEST_URL."/5");
        $response->assertStatus(200);
    }

    /**
     * @test 
     */
    public function delete_a_non_existing_student()
    {
        // Get token
        $token = $this->authenticate();
        $response = $this->withHeaders(
            [
            'Authorization' => 'Bearer ' . $token,
            ]
        )->json('DELETE', self::API_REQUEST_URL."/500000");
        $response->assertStatus(404);
    }
}
