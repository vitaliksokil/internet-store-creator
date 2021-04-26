<?php


namespace App\Services\UserService;


use App\Models\User;
use App\Services\FileUploaderService\FileUploaderServiceInterface;
use Illuminate\Support\Str;

class UserService implements UserServiceInterface
{
    /**
     * @var FileUploaderServiceInterface
     */
    private $fileUploaderService;

    public function __construct(FileUploaderServiceInterface $fileUploaderService)
    {
        $this->fileUploaderService = $fileUploaderService;
    }

    public function update(User $user,array $data)
    {

        if (isset($data['img'])){
            $user->img = $this->fileUploaderService->uploadImg($user,$data['img'],User::IMAGE_PATH);
            $user->save();
            unset($data['img']);
        }
        if(isset($data['email'])){
            if($data['email'] != $user->email){
                $data['email_verified_at'] = null;
            }
        }
        $user->update($data);
        return $user;
    }
}
