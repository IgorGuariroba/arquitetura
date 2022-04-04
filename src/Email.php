<?php


namespace igor\Arquitetura;


class Email
{
    private string $email;

    /**
     * @throws \Exception
     */
    public function __construct(string $email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new \InvalidArgumentException(
                'O e-mail não é autêntico !'
            );
        }

        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}