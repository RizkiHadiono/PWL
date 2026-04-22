<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Group;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make([
                    Section::make('Post Details')
                        ->description('Main details of the post.')
                        ->icon('heroicon-o-document-text')
                        ->schema([
                            Group::make([
                                TextInput::make('title')
                                    ->required()
                                    ->rules(['min:5'])
                                    ->validationMessages([
                                        'min' => 'Judul minimal harus terdiri dari 5 karakter.',
                                        'required' => 'Judul dari postingan wajib untuk diisi.',
                                    ]),
                                TextInput::make('slug')
                                    ->required()
                                    ->rules(['min:3'])
                                    ->unique(ignoreRecord: true)
                                    ->validationMessages([
                                        'unique' => 'Slug sudah terdaftar, silakan gunakan slug lain.',
                                        'min' => 'Slug minimal harus terdiri dari 3 karakter.',
                                    ]),
                                Select::make('category_id')
                                    ->label('Category')
                                    ->options(\App\Models\Category::all()->pluck('name', 'id'))
                                    ->required(),
                                ColorPicker::make('color'),
                            ])->columns(2),
                            MarkdownEditor::make('body')
                                ->columnSpanFull(),
                        ]),
                ])->columnSpan(2),

                Group::make([
                    Section::make('Image Upload')
                        ->icon('heroicon-o-photo')
                        ->schema([
                            FileUpload::make('image')
                                ->disk('public')
                                ->directory('post')
                                ->required()
                                ->validationMessages([
                                    'required' => 'Gambar pos wajib untuk diunggah.',
                                ]),
                        ]),
                    Section::make('Meta')
                        ->icon('heroicon-o-tag')
                        ->schema([
                            TagsInput::make('tags'),
                            Checkbox::make('published'),
                            DatePicker::make('published_at'),
                        ]),
                ])->columnSpan(1),
            ])
            ->columns(3);
    }
}
