<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the RolePermissionSeeder first
        $this->call([
            RolePermissionSeeder::class,
            NewsCategorySeeder::class,
            NewsSeeder::class,
            EventSeeder::class,
            GalleryItemSeeder::class,
            AnnouncementSeeder::class,
            AnnouncementAttachmentSeeder::class,
            OverviewStatSeeder::class,
            GenderStatSeeder::class,
            AgeStatSeeder::class,
            FamilySizeSeeder::class,
            FamilyTypeSeeder::class,
            HousingStatSeeder::class,
            EducationStatSeeder::class,
            EmploymentStatSeeder::class,
            IdmScoreSeeder::class,
            IdmDimensionSeeder::class,
            SdgsProgressSeeder::class,
            DataDownloadSeeder::class,
            QuickContactSeeder::class,
            QuickContactInfoSeeder::class,
            LocationInfoSeeder::class,
            BoundarySeeder::class,
            VillageOfficialSeeder::class,
            OfficeScheduleSeeder::class,
            ContactMessageSeeder::class,
            ServiceCategorySeeder::class,
            LetterServiceSeeder::class,
            LetterServiceRequirementSeeder::class,
            ProposalSeeder::class,
            ServiceEventSeeder::class,
            VillageStatSeeder::class,
            HistoryEventSeeder::class,
            MissionSeeder::class,
            GovernmentStructureSeeder::class,
            AdministrativeAreaSeeder::class,
            AdministrativeRtSeeder::class,
            GeographicalDataSeeder::class,
            TransparencyIndicatorSeeder::class,
            BudgetOverviewSeeder::class,
            BudgetCategorySeeder::class,
            BudgetRealizationSeeder::class,
            AssistanceProgramSeeder::class,
            RecipientCategorySeeder::class,

        ]);

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
