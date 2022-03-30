<?php
namespace App\Components\Zoho\Market\Services;

use App\Components\Zoho\Market\Requests\ActionRequestDTO;
use App\Models\Company;
use App\Models\EmailCompany;
use App\Models\Extension;
use App\Models\InstallationExtension;

class ExtensionService
{
    public function install(ActionRequestDTO $actionDTO)
    {
        $company = Company::withTrashed()->firstOrCreate(
            ['id' => $actionDTO->companyId],
            ['name' => $actionDTO->email],
        );

        if($company->trashed()) {
            $company->deleted_at = null;
        }

        EmailCompany::updateOrCreate([
            'company_id' => $company->id,
            'email' => $actionDTO->email,
        ],[]);

        $extension = Extension::find($actionDTO->extensionId);

        $installationExtension = $extension->installations()->byCompanyId($company->id)
            ->first();

        if (empty($installationExtension)) {
            InstallationExtension::create([
                'extension_id' => $actionDTO->extensionId,
                'company_id' => $company->id,
                'zapikey' => $actionDTO->zapikey,
            ]);
        }
    }

    public function uninstall(ActionRequestDTO $actionDTO)
    {
    }

    public function purchase(ActionRequestDTO $actionDTO)
    {
    }

    public function downgrade(ActionRequestDTO $actionDTO)
    {
    }
}
