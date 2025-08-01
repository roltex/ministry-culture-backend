<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Utils\GeorgianTransliterator;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'გვერდები';
    protected static ?string $navigationGroup = 'კონტენტის მართვა';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('გვერდის კონტენტი')
                    ->tabs([
                        Tab::make('ქართული')
                            ->schema([
                                TextInput::make('title.ka')
                                    ->label('სათაური (ქართული)')
                                    ->required()
                                    ->maxLength(255),
                                RichEditor::make('content.ka')
                                    ->label('შინაარსი (ქართული)')
                                    ->required()
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('ინგლისური')
                            ->schema([
                                TextInput::make('title.en')
                                    ->label('სათაური (ინგლისური)')
                                    ->required()
                                    ->maxLength(255),
                                RichEditor::make('content.en')
                                    ->label('შინაარსი (ინგლისური)')
                                    ->required()
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
                
                Section::make('პარამეტრები')
                    ->schema([
                        TextInput::make('slug')
                            ->label('Slug')
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->live()
                            ->afterStateUpdated(function ($state, $set, $get) {
                                $georgianTitle = $get('title.ka');
                                if (!empty($georgianTitle) && empty($state)) {
                                    $slug = GeorgianTransliterator::generateSlug($georgianTitle);
                                    $set('slug', $slug);
                                }
                            })
                            ->helperText('მაგ: about, mission, history'),
                        
                        FileUpload::make('photo')
                            ->label('ფოტო')
                            ->image()
                            
                            
                            ->directory('pages')
                            ->maxSize(2048)
                            ->imageEditor()
                            ->imageCropAspectRatio('16:9'),
                    ])
                    ->columns(2),
                
                Section::make('სოციალური ქსელები')
                    ->schema([
                        TextInput::make('facebook_url')
                            ->label('Facebook URL')
                            ->url()
                            ->prefix('https://'),
                        TextInput::make('twitter_url')
                            ->label('Twitter URL')
                            ->url()
                            ->prefix('https://'),
                        TextInput::make('instagram_url')
                            ->label('Instagram URL')
                            ->url()
                            ->prefix('https://'),
                        TextInput::make('youtube_url')
                            ->label('YouTube URL')
                            ->url()
                            ->prefix('https://'),
                        TextInput::make('linkedin_url')
                            ->label('LinkedIn URL')
                            ->url()
                            ->prefix('https://'),
                        TextInput::make('telegram_url')
                            ->label('Telegram URL')
                            ->url()
                            ->prefix('https://'),
                    ])
                    ->columns(3),
                
                FileUpload::make('attachments')
                    ->label('დანართები')
                                            
                        
                    ->directory('page-attachments')
                    ->multiple()
                    ->maxFiles(5)
                    ->maxSize(10240)
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'])
                    ->helperText('შეგიძლიათ ატვირთოთ მაქსიმუმ 5 ფაილი (PDF, Word, Excel - თითოეული მაქს. 10MB)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                                ImageColumn::make('photo')
                    ->label('ფოტო')
                    ->width(60)
                    ->height(40),
                TextColumn::make('title')
                    ->label('სათაური')
                    ->formatStateUsing(fn ($record) => $record->getTranslation('title', 'ka'))
                    ->limit(40)
                    ->searchable(query: function ($query, string $search) {
                        return $query->where('title->ka', 'like', "%{$search}%");
                    }),
                TextColumn::make('slug')
                    ->label('Slug'),
                TextColumn::make('created_at')
                    ->label('შექმნის თარიღი')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'view' => Pages\ViewPage::route('/{record}'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
