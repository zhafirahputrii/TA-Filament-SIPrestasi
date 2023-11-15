<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LombaResource\Pages;
use App\Filament\Resources\LombaResource\RelationManagers;
use App\Models\Lomba;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LombaResource extends Resource
{
    protected static ?string $model = Lomba::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Lomba')
                ->schema([
                Select::make('siswa_id')->required()
                   ->relationship('siswa', 'name'), 
                TextInput::make('lomba')->required(),
                TextInput::make('penyelenggara')->required(),
                Select::make('tingkat')->required()
                    ->options([
                        'Kota' => 'Kota',
                        'Provinsi' => 'Provinsi',
                        'Nasional' => 'Nasional',
                        'Internasional' => 'Internasional'
                    ]),
                    DatePicker::make('tanggal')->required(),
                    ])->columnSpan(2),

                    Section::make('juara')
                    ->schema([
                    Toggle::make('status'),
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('siswa.name')->label('Siswa')->searchable()->sortable(),
                TextColumn::make('lomba'),
                TextColumn::make('penyelenggara'),
                TextColumn::make('tingkat'),
                TextColumn::make('tanggal')->sortable(),
                ToggleColumn::make('status')
            ])
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
            'index' => Pages\ListLombas::route('/'),
            'create' => Pages\CreateLomba::route('/create'),
            //'edit' => Pages\EditLomba::route('/{record}/edit'),
        ];

    }    
}
