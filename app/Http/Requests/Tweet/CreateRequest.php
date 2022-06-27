<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tweet' => 'required|max:140',
            'iamges' => 'array|max:4',
            'iamges.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    //requestクラスのuser関数で今自分がログインしているユーザーが取得できる
    public function userId()
    {
        return $this->user()->id;
    }

    //投稿されたデータを取得するため
    public function tweet(): string
    {
        return $this->input('tweet');
    }

    public function images(): array
    {
        return $this->file('images', []);
    }
}
