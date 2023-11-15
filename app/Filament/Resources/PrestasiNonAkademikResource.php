<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrestasiNonAkademikResource\Pages;
use App\Filament\Resources\PrestasiNonAkademikResource\RelationManagers;
use App\Models\PrestasiNonAkademik;
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

class PrestasiNonAkademikResource extends Resource
{
    protected static ?string $model = PrestasiNonAkademik::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

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
            'index' => Pages\ListPrestasiNonAkademiks::route('/'),
            'create' => Pages\CreatePrestasiNonAkademik::route('/create'),
            //'edit' => Pages\EditPrestasiNonAkademik::route('/{record}/edit'),
        ];
    }    
}
