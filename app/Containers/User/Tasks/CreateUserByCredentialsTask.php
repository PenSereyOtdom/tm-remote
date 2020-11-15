<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Data\Repositories\UserRepository;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\Hash;

/**
 * Class CreateUserByCredentialsTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class CreateUserByCredentialsTask extends Task
{

    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

  /**
   * @param bool $isClient
   * @param string $email
   * @param string $password
   * @param string|null $name
   * @param string $plan
   * @param string $status
   * @return  mixed
   */
    public function run(
        bool $isClient = true,
        string $email,
        string $password,
        string $name = null,
        string $plan = null,
        string $status = null,
        int $company_id = null
    ): User {

        try {
            // create new user
            $data = [
                'password'  => Hash::make($password),
                'email'     => $email,
                'name'      => $name,
                'plan'      => $plan,
                'status'    => $status,
                'is_client' => $isClient,
            ];
            if ($company_id!=null) {
                $data['company_id'] = $company_id;
            }
            $user = $this->repository->create($data);

        } catch (Exception $e) {
            throw (new CreateResourceFailedException())->debug($e);
        }

        return $user;
    }

}
