<?php

namespace App\Filament\Resources;

use Dom\Text;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\KostOwner;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KostOwnerResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KostOwnerResource\RelationManagers;

class KostOwnerResource extends Resource
{
    protected static ?string $model = KostOwner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Enter the name of the Kost owner'),
                TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->placeholder('Enter the email address of the Kost owner'),
                TextInput::make('phone')
                    ->label('Phone')
                    ->tel()
                    ->nullable()
                    ->maxLength(20)
                    ->placeholder('Enter the phone number of the Kost owner'),
                Textarea::make('address')
                    ->label('Address')
                    ->nullable()
                    ->maxLength(255)
                    ->placeholder('Enter the address of the Kost owner'),
                TextInput::make('profile_picture')
                    ->label('Profile Picture')
                    ->nullable()
                    ->maxLength(255)
                    ->placeholder('Enter the URL of the profile picture'),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->icon('heroicon-m-envelope')
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Email address copied')
                    ->copyMessageDuration(1500),
                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable()
                    ->icon('heroicon-m-phone')
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Phone number copied')
                    ->copyMessageDuration(1500),
                TextColumn::make('address')
                    ->label('Address')
                    ->searchable()
                    ->sortable(),
                ToggleColumn::make('is_active')
                    ->label('Active Status')
                    ->sortable(),
                ToggleColumn::make('is_verified')
                    ->label('Verification Status')
                    ->sortable(),
                ImageColumn::make('profile_picture')
                    ->label('Profile Picture')
                    ->circular()
                    ->size(50)
                    ->defaultImageUrl(url('/image/placeholder.jpg'))
                    ->placeholder('No image available'),
                 
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKostOwners::route('/'),
            'create' => Pages\CreateKostOwner::route('/create'),
            'edit' => Pages\EditKostOwner::route('/{record}/edit'),
        ];
    }
}
