<?php

namespace App\Http\Requests;

/**
 * Class UserRequest
 *
 * @property string $date
 * @package App\Http\Requests
 */
class UserRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
	
		  switch($this->method()) {
				case 'PATCH':
					$uniqueEmail = 'userUnique:users,email,' . $this->user->id;
					$password = 'nullable|min:6';
					$profileImage = 'nullable|mimes:jpeg,png,jpg';
					break;
				case 'POST':
					$uniqueEmail = 'userUnique:users,email';
					$password = 'required|min:6';
					$profileImage = 'required|mimes:jpeg,png,jpg';
				   break;
				default:
					return [];
			}
			
		  $rules = [
				'fullName' => 'required|string|max:255',
				'mobileNumber' => 'required|numeric',
				'password' => $password,
				'email' => 'required|email|'.$uniqueEmail,
				'profileImage' => $profileImage,
			];

		 return $rules;
    }
	
	public function messages()
    {
        return [
            'email.user_unique' => 'The email address has already been taken.',
        ];
    }
}

