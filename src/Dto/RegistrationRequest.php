<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;


class RegistrationRequest
{
    #[Serializer\Type('string')]
    #[Assert\NotBlank(message: 'Email не заполнен!')]
    #[Assert\Email(message: 'Email заполнен не верно!')]
    public ?string $email;

    #[Serializer\Type('string')]
    #[Assert\NotBlank(message: 'Пароль не заполнен!')]
    #[Assert\Length(min: 6, minMessage: 'Пароль должен содержать минимум {{ limit }} символов.')]
    public ?string $password;
}