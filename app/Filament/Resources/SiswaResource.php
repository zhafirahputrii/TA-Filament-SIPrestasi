<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Siswa')
                ->schema([
                TextInput::make('name'),
                TextInput::make('nisn')->unique(ignoreRecord:true),
                Select::make('kelas')->required()
                ->options([
                    '7A' => '7A',
                    '7B' => '7B',
                    '7C' => '7C',
                    '8A' => '8A',
                    '8B' => '8B',
                    '8C' => '8C',
                    '9A' => '9A',
                    '9B' => '9B',
                    '9C' => '9C',
                ]),
                Select::make('jenis_kelamin')->required()
                ->options([
                    'Laki-laki' => 'Laki-laki',
                    'Perempuan' => 'Perempuan'
                ]),
                Textarea::make('alamat')->required()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('nisn')->searchable(),
                TextColumn::make('kelas')->searchable(),
                TextColumn::make('jenis_kelamin'),
                TextColumn::make('alamat')
            ])
            ->defaultSort('name', 'desc' )
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            //'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }    
}
