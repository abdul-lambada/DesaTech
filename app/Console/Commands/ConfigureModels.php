<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ConfigureModels extends Command
{
    protected $signature = 'models:configure';
    protected $description = 'Configure all models with fillable fields, relationships, and helper methods';

    public function handle()
    {
        $this->info('Configuring models...');

        $models = [
            'AgeStat' => [
                'fillable' => ['age_group', 'count', 'percentage', 'color'],
                'casts' => ['count' => 'integer', 'percentage' => 'integer'],
                'methods' => [
                    'scopeByAgeGroup($query, $ageGroup)' => 'return $query->where("age_group", $ageGroup);',
                    'getFormattedPercentageAttribute()' => 'return $this->percentage . "%";'
                ]
            ],
            'FamilySize' => [
                'fillable' => ['size', 'count', 'percentage', 'color'],
                'casts' => ['count' => 'integer', 'percentage' => 'integer'],
                'methods' => [
                    'scopeBySize($query, $size)' => 'return $query->where("size", $size);',
                    'getFormattedPercentageAttribute()' => 'return $this->percentage . "%";'
                ]
            ],
            'FamilyType' => [
                'fillable' => ['type', 'count', 'percentage', 'color'],
                'casts' => ['count' => 'integer', 'percentage' => 'integer'],
                'methods' => [
                    'scopeByType($query, $type)' => 'return $query->where("type", $type);',
                    'getFormattedPercentageAttribute()' => 'return $this->percentage . "%";'
                ]
            ],
            'HousingStat' => [
                'fillable' => ['type', 'count', 'percentage', 'color'],
                'casts' => ['count' => 'integer', 'percentage' => 'integer'],
                'methods' => [
                    'scopeByType($query, $type)' => 'return $query->where("type", $type);',
                    'getFormattedPercentageAttribute()' => 'return $this->percentage . "%";'
                ]
            ],
            'EducationStat' => [
                'fillable' => ['level', 'count', 'percentage', 'color'],
                'casts' => ['count' => 'integer', 'percentage' => 'integer'],
                'methods' => [
                    'scopeByLevel($query, $level)' => 'return $query->where("level", $level);',
                    'getFormattedPercentageAttribute()' => 'return $this->percentage . "%";'
                ]
            ],
            'EmploymentStat' => [
                'fillable' => ['sector', 'count', 'percentage', 'color'],
                'casts' => ['count' => 'integer', 'percentage' => 'integer'],
                'methods' => [
                    'scopeBySector($query, $sector)' => 'return $query->where("sector", $sector);',
                    'getFormattedPercentageAttribute()' => 'return $this->percentage . "%";'
                ]
            ],
            'IdmScore' => [
                'fillable' => ['year', 'score', 'category'],
                'casts' => ['score' => 'decimal:2'],
                'methods' => [
                    'scopeByYear($query, $year)' => 'return $query->where("year", $year);',
                    'scopeByCategory($query, $category)' => 'return $query->where("category", $category);'
                ]
            ],
            'IdmDimension' => [
                'fillable' => ['name', 'description', 'weight'],
                'casts' => ['weight' => 'decimal:2'],
                'methods' => [
                    'scopeByWeight($query, $weight)' => 'return $query->where("weight", $weight);'
                ]
            ],
            'SdgsProgress' => [
                'fillable' => ['goal', 'target', 'progress', 'status'],
                'casts' => ['progress' => 'decimal:2'],
                'methods' => [
                    'scopeByGoal($query, $goal)' => 'return $query->where("goal", $goal);',
                    'scopeByStatus($query, $status)' => 'return $query->where("status", $status);'
                ]
            ],
            'DataDownload' => [
                'fillable' => ['title', 'description', 'file_path', 'download_count'],
                'casts' => ['download_count' => 'integer'],
                'methods' => [
                    'incrementDownloadCount()' => '$this->increment("download_count");',
                    'scopePopular($query)' => 'return $query->orderBy("download_count", "desc");'
                ]
            ],
            'QuickContact' => [
                'fillable' => ['name', 'phone', 'email', 'subject', 'message'],
                'methods' => [
                    'scopeUnread($query)' => 'return $query->where("read", false);',
                    'markAsRead()' => '$this->update(["read" => true]);'
                ]
            ],
            'QuickContactInfo' => [
                'fillable' => ['type', 'value', 'description'],
                'methods' => [
                    'scopeByType($query, $type)' => 'return $query->where("type", $type);'
                ]
            ],
            'LocationInfo' => [
                'fillable' => ['address', 'latitude', 'longitude', 'description'],
                'casts' => ['latitude' => 'decimal:8', 'longitude' => 'decimal:8'],
                'methods' => [
                    'getCoordinatesAttribute()' => 'return $this->latitude . ", " . $this->longitude;'
                ]
            ],
            'Boundary' => [
                'fillable' => ['name', 'coordinates', 'area'],
                'casts' => ['area' => 'decimal:2'],
                'methods' => [
                    'scopeByName($query, $name)' => 'return $query->where("name", $name);'
                ]
            ],
            'VillageOfficial' => [
                'fillable' => ['name', 'position', 'phone', 'email', 'photo'],
                'methods' => [
                    'scopeByPosition($query, $position)' => 'return $query->where("position", $position);'
                ]
            ],
            'OfficeSchedule' => [
                'fillable' => ['day', 'open_time', 'close_time', 'is_open'],
                'casts' => ['is_open' => 'boolean'],
                'methods' => [
                    'scopeOpen($query)' => 'return $query->where("is_open", true);',
                    'getFormattedTimeAttribute()' => 'return $this->open_time . " - " . $this->close_time;'
                ]
            ],
            'ContactMessage' => [
                'fillable' => ['name', 'email', 'subject', 'message', 'status'],
                'methods' => [
                    'scopeUnread($query)' => 'return $query->where("status", "unread");',
                    'scopeRead($query)' => 'return $query->where("status", "read");',
                    'markAsRead()' => '$this->update(["status" => "read"]);'
                ]
            ],
            'LetterServiceRequirement' => [
                'fillable' => ['letter_service_id', 'requirement', 'is_required'],
                'casts' => ['is_required' => 'boolean'],
                'relationships' => [
                    'letterService' => 'BelongsTo::class'
                ]
            ],
            'Proposal' => [
                'fillable' => ['title', 'description', 'budget', 'status', 'submitted_by'],
                'casts' => ['budget' => 'decimal:2'],
                'methods' => [
                    'scopeByStatus($query, $status)' => 'return $query->where("status", $status);',
                    'scopePending($query)' => 'return $query->where("status", "pending");',
                    'scopeApproved($query)' => 'return $query->where("status", "approved");'
                ]
            ],
            'ServiceEvent' => [
                'fillable' => ['title', 'description', 'date', 'location', 'status'],
                'casts' => ['date' => 'date'],
                'methods' => [
                    'scopeUpcoming($query)' => 'return $query->where("date", ">=", now())->orderBy("date");',
                    'scopePast($query)' => 'return $query->where("date", "<", now())->orderBy("date", "desc");'
                ]
            ],
            'VillageStat' => [
                'fillable' => ['year', 'population', 'area', 'density'],
                'casts' => ['year' => 'integer', 'population' => 'integer', 'area' => 'decimal:2', 'density' => 'decimal:2'],
                'methods' => [
                    'scopeByYear($query, $year)' => 'return $query->where("year", $year);',
                    'scopeLatest($query)' => 'return $query->orderBy("year", "desc")->first();'
                ]
            ],
            'HistoryEvent' => [
                'fillable' => ['title', 'description', 'year', 'significance'],
                'casts' => ['year' => 'integer'],
                'methods' => [
                    'scopeByYear($query, $year)' => 'return $query->where("year", $year);',
                    'scopeChronological($query)' => 'return $query->orderBy("year", "asc");'
                ]
            ],
            'Mission' => [
                'fillable' => ['title', 'description', 'priority'],
                'methods' => [
                    'scopeByPriority($query, $priority)' => 'return $query->where("priority", $priority);',
                    'scopeHighPriority($query)' => 'return $query->where("priority", "high");'
                ]
            ],
            'GovernmentStructure' => [
                'fillable' => ['position', 'name', 'description', 'level'],
                'methods' => [
                    'scopeByLevel($query, $level)' => 'return $query->where("level", $level);'
                ]
            ],
            'AdministrativeArea' => [
                'fillable' => ['name', 'type', 'population', 'area'],
                'casts' => ['population' => 'integer', 'area' => 'decimal:2'],
                'methods' => [
                    'scopeByType($query, $type)' => 'return $query->where("type", $type);'
                ]
            ],
            'AdministrativeRt' => [
                'fillable' => ['rt_number', 'rw_number', 'head_name', 'population'],
                'casts' => ['rt_number' => 'integer', 'rw_number' => 'integer', 'population' => 'integer'],
                'methods' => [
                    'scopeByRt($query, $rt)' => 'return $query->where("rt_number", $rt);',
                    'scopeByRw($query, $rw)' => 'return $query->where("rw_number", $rw);'
                ]
            ],
            'GeographicalData' => [
                'fillable' => ['type', 'coordinates', 'description'],
                'methods' => [
                    'scopeByType($query, $type)' => 'return $query->where("type", $type);'
                ]
            ],
            'TransparencyIndicator' => [
                'fillable' => ['indicator', 'score', 'category'],
                'casts' => ['score' => 'decimal:2'],
                'methods' => [
                    'scopeByCategory($query, $category)' => 'return $query->where("category", $category);'
                ]
            ],
            'BudgetOverview' => [
                'fillable' => ['year', 'total_budget', 'realized_budget', 'percentage'],
                'casts' => ['year' => 'integer', 'total_budget' => 'decimal:2', 'realized_budget' => 'decimal:2', 'percentage' => 'decimal:2'],
                'methods' => [
                    'scopeByYear($query, $year)' => 'return $query->where("year", $year);',
                    'getRemainingBudgetAttribute()' => 'return $this->total_budget - $this->realized_budget;'
                ]
            ],
            'BudgetCategory' => [
                'fillable' => ['name', 'description', 'allocation'],
                'casts' => ['allocation' => 'decimal:2'],
                'methods' => [
                    'scopeByAllocation($query, $min, $max)' => 'return $query->whereBetween("allocation", [$min, $max]);'
                ]
            ],
            'BudgetRealization' => [
                'fillable' => ['category_id', 'planned', 'realized', 'percentage'],
                'casts' => ['planned' => 'decimal:2', 'realized' => 'decimal:2', 'percentage' => 'decimal:2'],
                'relationships' => [
                    'category' => 'BelongsTo::class'
                ],
                'methods' => [
                    'getVarianceAttribute()' => 'return $this->realized - $this->planned;'
                ]
            ],
            'AssistanceProgram' => [
                'fillable' => ['name', 'description', 'budget', 'beneficiaries'],
                'casts' => ['budget' => 'decimal:2', 'beneficiaries' => 'integer'],
                'methods' => [
                    'scopeActive($query)' => 'return $query->where("status", "active");'
                ]
            ],
            'RecipientCategory' => [
                'fillable' => ['name', 'description', 'criteria'],
                'methods' => [
                    'scopeByName($query, $name)' => 'return $query->where("name", $name);'
                ]
            ],
            'FinancialReport' => [
                'fillable' => ['title', 'period', 'file_path', 'description'],
                'methods' => [
                    'scopeByPeriod($query, $period)' => 'return $query->where("period", $period);'
                ]
            ],
            'TransparencyScore' => [
                'fillable' => ['year', 'score', 'category'],
                'casts' => ['year' => 'integer', 'score' => 'decimal:2'],
                'methods' => [
                    'scopeByYear($query, $year)' => 'return $query->where("year", $year);',
                    'scopeByCategory($query, $category)' => 'return $query->where("category", $category);'
                ]
            ],
            'DetailedScore' => [
                'fillable' => ['indicator', 'score', 'weight', 'category'],
                'casts' => ['score' => 'decimal:2', 'weight' => 'decimal:2'],
                'methods' => [
                    'scopeByCategory($query, $category)' => 'return $query->where("category", $category);',
                    'getWeightedScoreAttribute()' => 'return $this->score * $this->weight;'
                ]
            ],
            'PublicInformation' => [
                'fillable' => ['title', 'content', 'category', 'status'],
                'methods' => [
                    'scopePublished($query)' => 'return $query->where("status", "published");',
                    'scopeByCategory($query, $category)' => 'return $query->where("category", $category);'
                ]
            ],
            'VillageInfo' => [
                'fillable' => ['name', 'description', 'history', 'vision', 'mission'],
                'methods' => [
                    'scopeByName($query, $name)' => 'return $query->where("name", $name);'
                ]
            ],
            'QuickService' => [
                'fillable' => ['name', 'description', 'icon', 'url'],
                'methods' => [
                    'scopeActive($query)' => 'return $query->where("status", "active");'
                ]
            ]
        ];

        foreach ($models as $modelName => $config) {
            $this->configureModel($modelName, $config);
        }

        $this->info('All models configured successfully!');
    }

    private function configureModel($modelName, $config)
    {
        $modelPath = app_path("Models/{$modelName}.php");

        if (!File::exists($modelPath)) {
            $this->warn("Model {$modelName} not found, skipping...");
            return;
        }

        $content = File::get($modelPath);

        // Add use statements
        $useStatements = [
            'use Illuminate\Database\Eloquent\Factories\HasFactory;',
            'use Illuminate\Database\Eloquent\Model;'
        ];

        if (isset($config['relationships'])) {
            foreach ($config['relationships'] as $relation => $type) {
                $useStatements[] = "use Illuminate\Database\Eloquent\Relations\\{$type};";
            }
        }

        // Build model content
        $modelContent = "<?php\n\n";
        $modelContent .= "namespace App\Models;\n\n";
        $modelContent .= implode("\n", array_unique($useStatements)) . "\n\n";
        $modelContent .= "class {$modelName} extends Model\n";
        $modelContent .= "{\n";
        $modelContent .= "    use HasFactory;\n\n";

        // Add fillable
        if (isset($config['fillable'])) {
            $modelContent .= "    protected \$fillable = [\n";
            foreach ($config['fillable'] as $field) {
                $modelContent .= "        '{$field}',\n";
            }
            $modelContent .= "    ];\n\n";
        }

        // Add casts
        if (isset($config['casts'])) {
            $modelContent .= "    protected \$casts = [\n";
            foreach ($config['casts'] as $field => $type) {
                $modelContent .= "        '{$field}' => '{$type}',\n";
            }
            $modelContent .= "    ];\n\n";
        }

        // Add relationships
        if (isset($config['relationships'])) {
            foreach ($config['relationships'] as $relation => $type) {
                $modelContent .= "    public function {$relation}()\n";
                $modelContent .= "    {\n";
                $modelContent .= "        return \$this->belongsTo(" . str_replace('::class', '', $type) . "::class);\n";
                $modelContent .= "    }\n\n";
            }
        }

        // Add methods
        if (isset($config['methods'])) {
            foreach ($config['methods'] as $method => $body) {
                $modelContent .= "    public function {$method}\n";
                $modelContent .= "    {\n";
                $modelContent .= "        {$body}\n";
                $modelContent .= "    }\n\n";
            }
        }

        $modelContent .= "}\n";

        File::put($modelPath, $modelContent);
        $this->info("Configured {$modelName}");
    }
}
