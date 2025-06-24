@switch($service)
    @case("job")
        @php
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
        @endphp
        <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "JobPosting",
              "baseSalary": {
                "@type": "MonetaryAmount",
                "currency": "{{ get_current_currency('currency_main') }}",
                "value": {
                  "@type": "QuantitativeValue",
                  "value": {{ $row->salary_min ?? 0 }},
                  "unitText": "MONTH"
                }
              },
              "datePosted": "{{ date('Y-m-d', strtotime($row->created_at)) }}",
              "validThrough" : "{{ $row->expiration_date ? date('Y-m-d\TH:i', strtotime($row->expiration_date)) : date('Y-m-d\TH:i', strtotime('+2 months', strtotime($row->created_at))) }}",
              "hiringOrganization": {
                "@type": "Organization",
                "name": "{{ $company }}"
              },
              "description": "{{  get_exceprt(preg_replace('/\s+/', ' ', trim($translation->content)), 500, '...') }}",
              "employmentType": "{{ $employmentType ?? "" }}",
              "experienceRequirements": "{{ $experience }}",
              "jobLocation": {
                "@type": "Place",
                "address": {
                  "@type": "PostalAddress",
                  "addressLocality": "{{ $addressLocality }}"
                }
              },
              "occupationalCategory": "{{ $occupationalCategory }}",
              "skills": "{{ $skills }}",
              "title": "{{ $translation->title }}",
              "workHours": "{{ $row->hours }} @if($row->hours_type)/ {{ $row->hours_type_name }} @endif"
            }
        </script>
    @break
@endswitch
