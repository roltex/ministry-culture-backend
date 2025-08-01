<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Model;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    
    protected static ?string $navigationGroup = 'სისტემის მართვა';
    
    protected static ?string $navigationLabel = 'საიტის პარამეტრები';
    
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('საიტის პარამეტრები')
                    ->tabs([
                        Tab::make('ზოგადი ინფორმაცია')
                            ->schema([
                                Section::make('საიტის ინფორმაცია')
                                    ->schema([
                                        TextInput::make('site_name.ka')
                                            ->label('საიტის სახელი (ქართული)')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('site_name.en')
                                            ->label('საიტის სახელი (ინგლისური)')
                                    ->required()
                                    ->maxLength(255),
                                        Textarea::make('site_description.ka')
                                            ->label('საიტის აღწერა (ქართული)')
                                            ->rows(3)
                                            ->maxLength(500),
                                        Textarea::make('site_description.en')
                                            ->label('საიტის აღწერა (ინგლისური)')
                                            ->rows(3)
                                            ->maxLength(500),
                                        TextInput::make('site_keywords')
                                            ->label('საიტის საკვანძო სიტყვები')
                                            ->maxLength(500)
                                            ->helperText('მძიმით გამოყოფილი საკვანძო სიტყვები SEO-სთვის'),
                                    ])
                                    ->columns(2),
                                
                                Section::make('საკონტაქტო ინფორმაცია')
                                    ->schema([
                                        TextInput::make('contact_email')
                                            ->label('საკონტაქტო ელ-ფოსტა')
                                            ->email()
                                            ->required(),
                                        TextInput::make('contact_phone')
                                            ->label('საკონტაქტო ტელეფონი')
                                            ->tel()
                                            ->required(),
                                        TextInput::make('contact_address.ka')
                                            ->label('მისამართი (ქართული)')
                                            ->maxLength(500),
                                        TextInput::make('contact_address.en')
                                            ->label('მისამართი (ინგლისური)')
                                            ->maxLength(500),
                                        TextInput::make('working_hours.ka')
                                            ->label('სამუშაო საათები (ქართული)')
                                            ->maxLength(255),
                                        TextInput::make('working_hours.en')
                                            ->label('სამუშაო საათები (ინგლისური)')
                                            ->maxLength(255),
                                    ])
                                    ->columns(2),
                            ]),
                        
                        Tab::make('სოციალური ქსელები')
                            ->schema([
                                Section::make('სოციალური ქსელების ბმულები')
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
                                    ->columns(2),
                            ]),
                        
                        Tab::make('SEO და ანალიტიკა')
                            ->schema([
                                Section::make('SEO პარამეტრები')
                                    ->schema([
                                        TextInput::make('google_analytics_id')
                                            ->label('Google Analytics ID')
                                            ->helperText('მაგ., G-XXXXXXXXXX'),
                                        TextInput::make('google_tag_manager_id')
                                            ->label('Google Tag Manager ID')
                                            ->helperText('მაგ., GTM-XXXXXXX'),
                                        TextInput::make('facebook_pixel_id')
                                            ->label('Facebook Pixel ID')
                                            ->helperText('მაგ., XXXXXXXXXXX'),
                                        TextInput::make('yandex_metrika_id')
                                            ->label('Yandex Metrika ID')
                                            ->helperText('მაგ., XXXXXXXXXX'),
                                    ])
                                    ->columns(2),
                                
                                Section::make('მეტა ინფორმაცია')
                                    ->schema([
                                        TextInput::make('meta_title.ka')
                                            ->label('მეტა სათაური (ქართული)')
                                            ->maxLength(60)
                                            ->helperText('რეკომენდებული: 50-60 სიმბოლო'),
                                        TextInput::make('meta_title.en')
                                            ->label('მეტა სათაური (ინგლისური)')
                                            ->maxLength(60)
                                            ->helperText('რეკომენდებული: 50-60 სიმბოლო'),
                                        Textarea::make('meta_description.ka')
                                            ->label('მეტა აღწერა (ქართული)')
                                            ->rows(3)
                                            ->maxLength(160)
                                            ->helperText('რეკომენდებული: 150-160 სიმბოლო'),
                                        Textarea::make('meta_description.en')
                                            ->label('მეტა აღწერა (ინგლისური)')
                                            ->rows(3)
                                            ->maxLength(160)
                                            ->helperText('რეკომენდებული: 150-160 სიმბოლო'),
                                    ])
                                    ->columns(2),
                            ]),
                        
                        Tab::make('კონტენტი და ფუნქციები')
                            ->schema([
                                Section::make('კონტენტის პარამეტრები')
                                    ->schema([
                                        Toggle::make('enable_news')
                                            ->label('სიახლეების სექციის ჩართვა')
                                            ->default(true),
                                        Toggle::make('enable_projects')
                                            ->label('პროექტების სექციის ჩართვა')
                                            ->default(true),
                                        Toggle::make('enable_competitions')
                                            ->label('კონკურსების სექციის ჩართვა')
                                            ->default(true),
                                        Toggle::make('enable_vacancies')
                                            ->label('ვაკანსიების სექციის ჩართვა')
                                            ->default(true),
                                        Toggle::make('enable_legislation')
                                            ->label('კანონმდებლობის სექციის ჩართვა')
                                            ->default(true),
                                        Toggle::make('enable_institutions')
                                            ->label('სსიპების სექციის ჩართვა')
                                            ->default(true),
                                    ])
                                    ->columns(2),
                                
                                Section::make('ჩვენების პარამეტრები')
                                    ->schema([
                                        TextInput::make('news_per_page')
                                            ->label('სიახლეები გვერდზე')
                                            ->numeric()
                                            ->default(12)
                                            ->minValue(1)
                                            ->maxValue(50),
                                        TextInput::make('projects_per_page')
                                            ->label('პროექტები გვერდზე')
                                            ->numeric()
                                            ->default(12)
                                            ->minValue(1)
                                            ->maxValue(50),
                                        Toggle::make('enable_comments')
                                            ->label('კომენტარების ჩართვა')
                                            ->default(false),
                                        Toggle::make('enable_search')
                                            ->label('ძიების ჩართვა')
                                            ->default(true),
                                        Toggle::make('enable_newsletter')
                                            ->label('საინფორმაციო ბიულეტენის ჩართვა')
                                            ->default(false),
                                    ])
                                    ->columns(2),
                            ]),
                    ])
                    ->columnSpanFull(),
                
                Section::make('მედია')
                    ->schema([
                        FileUpload::make('site_logo')
                            ->label('საიტის ლოგო')
                            ->image()
                            ->directory('site-media')
                            ->maxSize(2048)
                            ->helperText('საიტის ლოგო (მაქს 2MB)'),
                        
                        FileUpload::make('site_favicon')
                            ->label('საიტის ფავიკონი')
                            ->image()
                            ->directory('site-media')
                            ->maxSize(1024)
                            ->helperText('ფავიკონი (მაქს 1MB, რეკომენდებული: 32x32px)'),
                        
                        FileUpload::make('default_image')
                            ->label('ნაგულისხმევი სურათი')
                            ->image()
                            ->directory('site-media')
                            ->maxSize(2048)
                            ->helperText('ნაგულისხმევი სურათი კონტენტისთვის სურათების გარეშე'),
                    ])
                    ->columns(3),
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
            'index' => Pages\ListSettings::route('/'),
            'edit' => Pages\EditSetting::route('/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function getNavigationBadge(): ?string
    {
        return null;
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->is_admin ?? false;
    }

    public static function getNavigationUrl(): string
    {
        return static::getUrl('edit');
    }
}
