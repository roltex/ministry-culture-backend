<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VacancyResource\Pages;
use App\Filament\Resources\VacancyResource\RelationManagers;
use App\Models\Vacancy;
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
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Storage;
use App\Utils\GeorgianTransliterator;

class VacancyResource extends Resource
{
    protected static ?string $model = Vacancy::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    
    protected static ?string $navigationGroup = 'კონტენტის მართვა';
    
    protected static ?string $navigationLabel = 'ვაკანსიები';
    protected static ?string $modelLabel = 'ვაკანსია';
    protected static ?string $pluralModelLabel = 'ვაკანსიები';
    
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('ვაკანსიის კონტენტი')
                    ->tabs([
                        Tab::make('ქართული')
                            ->schema([
                                TextInput::make('title.ka')
                                    ->label('სათაური (ქართული)')
                                    ->required()
                                    ->maxLength(255),
                                RichEditor::make('description.ka')
                                    ->label('აღწერა (ქართული)')
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('requirements.ka')
                                    ->label('მოთხოვნები (ქართული)')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('ინგლისური')
                            ->schema([
                                TextInput::make('title.en')
                                    ->label('სათაური (ინგლისური)')
                                    ->required()
                                    ->maxLength(255),
                                RichEditor::make('description.en')
                                    ->label('აღწერა (ინგლისური)')
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('requirements.en')
                                    ->label('მოთხოვნები (ინგლისური)')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
                
                Forms\Components\Section::make('სამუშაოს დეტალები')
                    ->schema([
                        TextInput::make('slug')
                            ->label('URL-ის ნაწილი')
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
                            ->helperText('სათაურის URL-ში გამოსაყენებელი ვერსია'),
                        
                        Select::make('department')
                            ->options([
                                'administration' => 'ადმინისტრაცია',
                                'culture' => 'კულტურა',
                                'sports' => 'სპორტი',
                                'finance' => 'ფინანსები',
                                'hr' => 'ადამიანური რესურსები',
                                'it' => 'ინფორმაციული ტექნოლოგიები',
                                'legal' => 'იურიდიული',
                                'public_relations' => 'საზოგადოებასთან ურთიერთობა',
                                'other' => 'სხვა',
                            ])
                            ->label('დეპარტამენტი')
                            ->required()
                            ->searchable(),
                        
                        Select::make('employment_type')
                            ->options([
                                'full_time' => 'სრული განაკვეთი',
                                'part_time' => 'ნახევარი განაკვეთი',
                                'contract' => 'კონტრაქტი',
                                'temporary' => 'დროებითი',
                                'internship' => 'სტაჟირება',
                            ])
                            ->label('დასაქმების ტიპი')
                            ->required(),
                        
                        TextInput::make('salary_range')
                            ->label('ხელფასის დიაპაზონი')
                            ->maxLength(255)
                            ->helperText('მაგ: 2000-3000 ლარი'),
                        
                        TextInput::make('location')
                            ->label('ადგილმდებარეობა')
                            ->maxLength(255),
                        
                        TextInput::make('contact_email')
                            ->label('საკონტაქტო ელ-ფოსტა')
                            ->email()
                            ->required(),
                        
                        TextInput::make('contact_phone')
                            ->label('საკონტაქტო ტელეფონი')
                            ->tel(),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('ვადები')
                    ->schema([
                        DatePicker::make('application_deadline')
                            ->label('განაცხადის ვადა')
                            ->required(),
                        
                        DatePicker::make('start_date')
                            ->label('მოსალოდნელი დაწყების თარიღი'),
                        
                        TextInput::make('duration')
                            ->label('ხანგრძლივობა')
                            ->maxLength(255)
                            ->helperText('მაგ: 6 თვე, მუდმივი'),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('პარამეტრები')
                    ->schema([
                        FileUpload::make('application_form')
                            ->label('განაცხადის ფორმა')
                            
                            
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('vacancy-forms')
                            ->maxSize(10240)
                            ->helperText('PDF ფაილი (მაქს 10MB)'),
                        
                        Toggle::make('is_published')
                            ->label('გამოქვეყნებული')
                            ->default(true),
                        
                        Toggle::make('is_active')
                            ->label('აქტიური')
                            ->default(true)
                            ->helperText('მიმდინარეობს განაცხადების მიღება?'),
                        
                        DateTimePicker::make('published_at')
                            ->label('გამოქვეყნების თარიღი')
                            ->default(now()),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('სათაური')
                    ->formatStateUsing(fn ($record) => $record->getTranslation('title', 'ka'))
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where('title->ka', 'like', "%{$search}%");
                    }),
                TextColumn::make('department')
                    ->label('დეპარტამენტი')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'administration' => 'ადმინისტრაცია',
                        'culture' => 'კულტურა',
                        'sports' => 'სპორტი',
                        'finance' => 'ფინანსები',
                        'hr' => 'ადამიანური რესურსები',
                        'it' => 'ინფორმაციული ტექნოლოგიები',
                        'legal' => 'იურიდიული',
                        'public_relations' => 'საზოგადოებასთან ურთიერთობა',
                        'other' => 'სხვა',
                        default => $state,
                    })
                    ->searchable(),
                TextColumn::make('employment_type')
                    ->label('დასაქმების ტიპი')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'full_time' => 'green',
                        'part_time' => 'blue',
                        'contract' => 'yellow',
                        'temporary' => 'orange',
                        'internship' => 'purple',
                    })
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'full_time' => 'სრული განაკვეთი',
                        'part_time' => 'ნახევარი განაკვეთი',
                        'contract' => 'კონტრაქტი',
                        'temporary' => 'დროებითი',
                        'internship' => 'სტაჟირება',
                        default => $state,
                    }),
                TextColumn::make('salary_range')
                    ->label('ხელფასი')
                    ->searchable(),
                TextColumn::make('application_deadline')
                    ->label('განაცხადის ვადა')
                    ->date()
                    ->sortable(),
                ToggleColumn::make('is_published')
                    ->label('გამოქვეყნებული'),
                ToggleColumn::make('is_active')
                    ->label('აქტიური'),
                TextColumn::make('created_at')
                    ->label('შექმნის თარიღი')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('department')
                    ->options([
                        'administration' => 'ადმინისტრაცია',
                        'culture' => 'კულტურა',
                        'sports' => 'სპორტი',
                        'finance' => 'ფინანსები',
                        'hr' => 'ადამიანური რესურსები',
                        'it' => 'ინფორმაციული ტექნოლოგიები',
                        'legal' => 'იურიდიული',
                        'public_relations' => 'საზოგადოებასთან ურთიერთობა',
                        'other' => 'სხვა',
                    ])
                    ->label('დეპარტამენტი'),
                SelectFilter::make('employment_type')
                    ->options([
                        'full_time' => 'სრული განაკვეთი',
                        'part_time' => 'ნახევარი განაკვეთი',
                        'contract' => 'კონტრაქტი',
                        'temporary' => 'დროებითი',
                        'internship' => 'სტაჟირება',
                    ])
                    ->label('დასაქმების ტიპი'),
                Filter::make('published')
                    ->label('გამოქვეყნებული')
                    ->query(fn (Builder $query): Builder => $query->where('is_published', true)),
                Filter::make('active')
                    ->label('აქტიური')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true)),
                Filter::make('deadline_approaching')
                    ->label('ვადა ახლოვდება')
                    ->query(fn (Builder $query): Builder => $query->where('application_deadline', '>', now())->where('application_deadline', '<', now()->addDays(7))),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('ნახვა'),
                Tables\Actions\EditAction::make()->label('რედაქტირება'),
                Tables\Actions\DeleteAction::make()->label('წაშლა'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('წაშლა'),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListVacancies::route('/'),
            'create' => Pages\CreateVacancy::route('/create'),
            'edit' => Pages\EditVacancy::route('/{record}/edit'),
        ];
    }
}
