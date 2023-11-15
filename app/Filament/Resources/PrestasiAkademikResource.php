<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrestasiAkademikResource\Pages;
use App\Filament\Resources\PrestasiAkademikResource\RelationManagers;
use App\Models\PrestasiAkademik;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PrestasiAkademikResource extends Resource
{
    protected static ?string $model = PrestasiAkademik::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Prestasi')
                ->schema([
                    Select::make('siswa_id')->required()
                    ->relationship('siswa', 'name'), 
                TextInput::make('juara')->required(),
                TextInput::make('lomba')->required(),
                TextInput::make('penyelenggara')->required(),
                Select::make('tingkat')->required()
                ->options([
                    'Kota' => 'Kota',
                    'Provinsi' => 'Provinsi',
                    'Nasional' => 'Nasional',
                    'Internasional' => 'Internasional'
                ]),
                DatePicker::make('tanggal')->required()
                ])->columnSpan(2),

                Section::make('Upload Sertifikat')
                ->schema([
                FileUpload::make('sertifikat')->required()
                ])->columnSpan(1),
                
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('siswa.name')->label('Siswa')->searchable()->sortable(),
                TextColumn::make('juara'),
                TextColumn::make('lomba'),
                TextColumn::make('penyelenggara'),
                TextColumn::make('tingkat'),
                TextColumn::make('tanggal')->sortable(),
                ImageColumn::make('sertifikat')
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
            'index' => Pages\ListPrestasiAkademiks::route('/'),
            'create' => Pages\CreatePrestasiAkademik::route('/create'),
            //'edit' => Pages\EditPrestasiAkademik::route('/{record}/edit'),
        ];
    }    
}
