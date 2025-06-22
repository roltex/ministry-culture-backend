<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;

class SettingController extends Controller
{
    public function index(): JsonResource
    {
        try {
            $settings = Setting::first();
            
            if (!$settings) {
                // Create default settings if none exist
                $settings = Setting::create([
                    'site_name' => json_encode([
                        'ka' => 'საქართველოს კულტურის სამინისტრო',
                        'en' => 'Ministry of Culture and Sport of Georgia'
                    ]),
                    'site_description' => json_encode([
                        'ka' => 'საქართველოს კულტურის სამინისტროს ოფიციალური ვებსაიტი',
                        'en' => 'Official website of the Ministry of Culture and Sport of Georgia'
                    ]),
                    'contact_email' => 'info@culture.gov.ge',
                    'contact_phone' => '+995 32 2 000 000',
                    'contact_address' => json_encode([
                        'ka' => 'თბილისი, საქართველო',
                        'en' => 'Tbilisi, Georgia'
                    ]),
                    'working_hours' => json_encode([
                        'ka' => 'ორშაბათი - პარასკევი, 09:00 - 18:00',
                        'en' => 'Monday - Friday, 9:00 AM - 6:00 PM'
                    ]),
                    'facebook_url' => 'https://facebook.com/culturegeorgia',
                    'twitter_url' => 'https://twitter.com/culturegeorgia',
                    'instagram_url' => 'https://instagram.com/culturegeorgia',
                    'youtube_url' => 'https://youtube.com/culturegeorgia',
                    'linkedin_url' => 'https://linkedin.com/company/culturegeorgia',
                ]);
            }
            
            return new SettingResource($settings);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Settings not available',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function all(): JsonResource
    {
        return $this->index();
    }

    public function contact(): JsonResponse
    {
        try {
            $settings = Setting::first();
            
            if (!$settings) {
                return response()->json([
                    'data' => [
                        'address' => 'Tbilisi, Georgia',
                        'phone' => '+995 32 2 000 000',
                        'email' => 'info@culture.gov.ge',
                        'working_hours' => 'Monday - Friday, 9:00 AM - 6:00 PM'
                    ]
                ]);
            }
            
            // Handle multilingual fields manually
            $address = 'Tbilisi, Georgia';
            $workingHours = 'Monday - Friday, 9:00 AM - 6:00 PM';
            
            if ($settings->contact_address) {
                $addressData = is_string($settings->contact_address) 
                    ? json_decode($settings->contact_address, true) 
                    : $settings->contact_address;
                    
                if (is_array($addressData)) {
                    $address = $addressData['ka'] ?? $addressData['en'] ?? 'Tbilisi, Georgia';
                } else {
                    $address = $settings->contact_address;
                }
            }
            
            if ($settings->working_hours) {
                $workingHoursData = is_string($settings->working_hours) 
                    ? json_decode($settings->working_hours, true) 
                    : $settings->working_hours;
                    
                if (is_array($workingHoursData)) {
                    $workingHours = $workingHoursData['ka'] ?? $workingHoursData['en'] ?? 'Monday - Friday, 9:00 AM - 6:00 PM';
                } else {
                    $workingHours = $settings->working_hours;
                }
            }
            
            return response()->json([
                'data' => [
                    'address' => $address,
                    'phone' => $settings->contact_phone,
                    'email' => $settings->contact_email,
                    'working_hours' => $workingHours
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Contact information not available',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function social(): JsonResponse
    {
        try {
            $settings = Setting::first();
            
            if (!$settings) {
                return response()->json([
                    'data' => [
                        'facebook' => 'https://facebook.com/culturegeorgia',
                        'twitter' => 'https://twitter.com/culturegeorgia',
                        'instagram' => 'https://instagram.com/culturegeorgia',
                        'youtube' => 'https://youtube.com/culturegeorgia',
                        'linkedin' => 'https://linkedin.com/company/culturegeorgia'
                    ]
                ]);
            }
            
            return response()->json([
                'data' => [
                    'facebook' => $settings->facebook_url,
                    'twitter' => $settings->twitter_url,
                    'instagram' => $settings->instagram_url,
                    'youtube' => $settings->youtube_url,
                    'linkedin' => $settings->linkedin_url
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Social media information not available',
                'message' => $e->getMessage()
            ], 500);
        }
    }
} 