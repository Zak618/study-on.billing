<?php

// namespace App\Tests\Controller;

// use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
// use Symfony\Component\HttpFoundation\Response;

// class AuthTest extends WebTestCase
// {
//     public function testRegistrationSuccess()
//     {
//         restore_error_handler();
//         restore_exception_handler();

//         $client = static::createClient();

//         $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');
//         $entityManager->beginTransaction();

//         try {
//             $client->request(
//                 'POST',
//                 '/api/v1/register',
//                 [],
//                 [],
//                 ['CONTENT_TYPE' => 'application/json'],
//                 json_encode([
//                     'email' => 'rolan5@gmail.com',
//                     'password' => 'password'
//                 ])
//             );

//             $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
//         } finally {
//             $entityManager->rollback();
//         }
//     }

//     public function testRegistrationDuplicateEmail()
//     {
//         restore_error_handler();
//         restore_exception_handler();

//         $client = static::createClient();

//         $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');
//         $entityManager->beginTransaction();

//         try {
//             $client->request(
//                 'POST',
//                 '/api/v1/register',
//                 [],
//                 [],
//                 ['CONTENT_TYPE' => 'application/json'],
//                 json_encode([
//                     'email' => 'admin@example.com',
//                     'password' => 'adminpassword'
//                 ])
//             );

//             $this->assertEquals(Response::HTTP_BAD_REQUEST, $client->getResponse()->getStatusCode());
//         } finally {
//             $entityManager->rollback();
//         }
//     }

//     public function testLoginSuccess()
//     {
//         restore_error_handler();
//         restore_exception_handler();

//         $client = static::createClient();

//         $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');
//         $entityManager->beginTransaction();

//         try {
//             $client->request(
//                 'POST',
//                 '/api/v1/auth',
//                 [],
//                 [],
//                 ['CONTENT_TYPE' => 'application/json'],
//                 json_encode([
//                     'username' => 'admin@example.com',
//                     'password' => 'adminpassword'
//                 ])
//             );

//             $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
//         } finally {
//             $entityManager->rollback();
//         }
//     }

//     public function testLoginInvalidCredentials()
//     {
//         restore_error_handler();
//         restore_exception_handler();

//         $client = static::createClient();

//         $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');
//         $entityManager->beginTransaction();

//         try {
//             $client->request(
//                 'POST',
//                 '/api/v1/auth',
//                 [],
//                 [],
//                 ['CONTENT_TYPE' => 'application/json'],
//                 json_encode([
//                     'username' => 'invalid@example.com',
//                     'password' => 'invalid-password'
//                 ])
//             );

//             $this->assertEquals(Response::HTTP_UNAUTHORIZED, $client->getResponse()->getStatusCode());
//         } finally {
//             $entityManager->rollback();
//         }
//     }
// }