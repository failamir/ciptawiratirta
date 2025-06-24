<?php switch($service):
    case ("job"): ?>
        <?php
            $skills = $experience = $occupationalCategory = $addressLocality = $company = '';
            if ($row->skills){
                foreach($row->skills as $skill){
                    $skill_translation = $skill->translateOrOrigin(app()->getLocale());
                    $skills .= $skill_translation->name. ' ';
                }
            }
            if(empty($row->experience) || (float)$row->experience < 1){
                $experience = __("Fresh");
            }else{
                $experience = $row->experience.' '. ($row->experience > 1 ? __("years") : __("year"));
            }
            if($row->category){
                $cat_translation = $row->category->translateOrOrigin(app()->getLocale());
                $occupationalCategory = $cat_translation->name;
            }
            if($row->location){
                $location_translation = $row->location->translateOrOrigin(app()->getLocale());
                $addressLocality = $location_translation->name;
            }
            if($row->jobType){
                $jobType_translation = $row->jobType->translateOrOrigin(app()->getLocale());
                $employmentType = $jobType_translation->name;
            }
            if($row->company){
                $company_translation = $row->company->translateOrOrigin(app()->getLocale());
                $company = $company_translation->name;
            }
        ?>
        <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "JobPosting",
              "baseSalary": {
                "@type": "MonetaryAmount",
                "currency": "<?php echo e(get_current_currency('currency_main')); ?>",
                "value": {
                  "@type": "QuantitativeValue",
                  "value": <?php echo e($row->salary_min ?? 0); ?>,
                  "unitText": "MONTH"
                }
              },
              "datePosted": "<?php echo e(date('Y-m-d', strtotime($row->created_at))); ?>",
              "validThrough" : "<?php echo e($row->expiration_date ? date('Y-m-d\TH:i', strtotime($row->expiration_date)) : date('Y-m-d\TH:i', strtotime('+2 months', strtotime($row->created_at)))); ?>",
              "hiringOrganization": {
                "@type": "Organization",
                "name": "<?php echo e($company); ?>"
              },
              "description": "<?php echo e(get_exceprt(preg_replace('/\s+/', ' ', trim($translation->content)), 500, '...')); ?>",
              "employmentType": "<?php echo e($employmentType ?? ""); ?>",
              "experienceRequirements": "<?php echo e($experience); ?>",
              "jobLocation": {
                "@type": "Place",
                "address": {
                  "@type": "PostalAddress",
                  "addressLocality": "<?php echo e($addressLocality); ?>"
                }
              },
              "occupationalCategory": "<?php echo e($occupationalCategory); ?>",
              "skills": "<?php echo e($skills); ?>",
              "title": "<?php echo e($translation->title); ?>",
              "workHours": "<?php echo e($row->hours); ?> <?php if($row->hours_type): ?>/ <?php echo e($row->hours_type_name); ?> <?php endif; ?>"
            }
        </script>
    <?php break; ?>
<?php endswitch; ?>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/Layout/parts/schema.blade.php ENDPATH**/ ?>