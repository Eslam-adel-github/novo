<?php

namespace App\Repositories\Eloquent\WebSetings;

use App\Repositories\Abstracts\RepositoryAbstract;
use App\WebsiteSetting;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Artisan;
use File;


class EloquentWebsiteSettingRepository extends RepositoryAbstract implements WebsiteSettingRepository
{
    /**
     * The Repository Entity.
     *
     * @return stdClass
     */
    public function entity() :string
    {
        return WebsiteSetting::class;
    }

    public function store()
    {
        $data = request()->all();
        foreach ($data as $key => $newValue) {
            if (!Str::startsWith($key, '_')) {
                $logo = WebsiteSetting::firstOrCreate(['key' => 'logo']);

                $logo_white = WebsiteSetting::firstOrCreate(['key' => 'logo_white']);

                $icon = WebsiteSetting::firstOrCreate(['key' => 'icon']);

                if ($key == 'logo' && $data['logo'] instanceof UploadedFile) {
                    if (ShowImageFromStorage($logo, 'WebsiteSetting') != asset("images/ibrain_logo.svg")) {
                        $data['logo'] = '{}';
                    }
                    $logo->storeImageFrom('logo');
                }

                if ($key == 'icon' && $data['icon'] instanceof UploadedFile) {
                    if (ShowImageFromStorage($icon, 'WebsiteSetting') != asset("images/ibrain_logo.svg")) {
                        $data['icon'] = '{}';
                    }
                    $icon->storeImageFrom('icon');
                }

                if ($key == 'logo_white' && $data['logo_white'] instanceof UploadedFile) {
                    if (ShowImageFromStorage($logo, 'WebsiteSetting') != asset("images/ibrain_logo.svg")) {
                        $data['logo_white'] = '{}';
                    }
                    $logo_white->storeImageFrom('logo_white');
                }

                if ($key == 'firebase_credentials' && isset($data['firebase_credentials']) && $data['firebase_credentials'] instanceof UploadedFile) {
                    $data['firebase_credentials'] = UploadHelper::uploadToStorage($data['firebase_credentials'], 'firebase/');
                }

                $this->entity->updateOrCreate(['key' => $key], ['data' => $data[$key] == "null" || $data[$key] == "[null]" ? null : $data[$key]]);

                if ($key == 's3_key') {
                    $this->envEdit('MEDIA_DISK', 's3');
                    $this->envEdit('AWS_ACCESS_KEY_ID', $data['s3_key']);
                }

                if ($key == 's3_region') {
                    $this->envEdit('AWS_DEFAULT_REGION', $data['s3_region']);
                }

                if ($key == 's3_secret') {
                    $this->envEdit('AWS_SECRET_ACCESS_KEY', $data['s3_secret']);
                }

                if ($key == 's3_bucket') {
                    $this->envEdit('AWS_BUCKET', $data['s3_bucket']);
                }

                if ($key == 's3_url') {
                    $this->envEdit('AWS_URL', $data['s3_url']);
                }

               // Artisan::call('config:clear');
            }
        }
        return true;
    }

    public function envEdit(string $key, string $content = null): void
    {
        if (checkVar($content)) {
            env($key, $content);
            $env_file_path = base_path('.env');
            $newContent = str_replace($key."=".env($key), $key."=\"".addslashes($content)."\"", File::get($env_file_path));
        }
    }
}
