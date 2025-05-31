<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;

class EditProfile extends BaseEditProfile
{
  public function form(Form $form): Form
  {
    return $form
      ->schema([
        $this->getNameFormComponent(),
        $this->getEmailFormComponent(),
        TextInput::make('phone')
          ->label(__('Phone'))
          ->required()
          ->maxLength(255),
        Textarea::make('address')
          ->label(__('Address'))
          ->required()
          ->maxLength(1000)
          ->rows(3),
        $this->getPasswordFormComponent(),
        $this->getPasswordConfirmationFormComponent(),
      ]);
  }
}
