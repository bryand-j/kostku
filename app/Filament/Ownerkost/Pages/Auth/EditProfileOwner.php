<?php

namespace App\Filament\Ownerkost\Pages\Auth;

use Filament\Forms\Form;
use Filament\Forms\Components\Tabs;
use App\Forms\Components\VerifiedInfo;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;

class EditProfileOwner extends BaseEditProfile
{
    public function form(Form $form): Form
    {
        
        return $form
            ->schema([
            
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Profile Data')
                            ->icon('heroicon-m-user-circle')
                            ->schema([
                                
                                $this->getNameFormComponent()->inlineLabel(false),
                                $this->getEmailFormComponent()->inlineLabel(false),
                                TextInput::make('phone')
                                    ->label(__('Phone'))
                                    ->inlineLabel(false)
                                    ->maxLength(255),
                                Textarea::make('address')
                                    ->label(__('Address'))
                                    ->inlineLabel(false)
                                    ->maxLength(1000)
                                    ->rows(3),
                                FileUpload::make('profile_picture')
                                    ->label(__('Profile Picture'))
                                    ->disk('s3')
                                    ->avatar()
                                    ->directory('owner-profile-pictures')
                                    ->inlineLabel(false),
                                VerifiedInfo::make('is_verified')
                                    ->inlineLabel(false)
                                    ->label(__('Verified Status')),
                            ]),
                        Tabs\Tab::make('Security')
                            ->icon('heroicon-m-lock-closed')
                            ->schema([
                                $this->getPasswordFormComponent()
                                    ->label(__('Change Password To :'))
                                    ->inlineLabel(false),
                                $this->getPasswordConfirmationFormComponent()->inlineLabel(false),
                            ]),
                        
                    ])
               ]);
    }

}
