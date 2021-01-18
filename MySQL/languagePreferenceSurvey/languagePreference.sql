create database codingLanguages;
use codingLanguages;

select * from kagglesurvey;

select count(LanguageRecommendationSelect) as numberOfRecommendations, LanguageRecommendationSelect from kagglesurvey
group by kagglesurvey.LanguageRecommendationSelect
having LanguageRecommendationSelect != ' '
order by numberOfRecommendations DESC
limit 10;

select count(EmployerIndustry) as quantity, EmployerIndustry from kagglesurvey
group by kagglesurvey.EmployerIndustry
having EmployerIndustry != ' '
order by quantity DESC
limit 15;

select count(WorkAlgorithmsSelect) as quantity, WorkAlgorithmsSelect from kagglesurvey
group by kagglesurvey.WorkAlgorithmsSelect
having WorkAlgorithmsSelect != ' '
order by quantity DESC
limit 15;

select count(WorkToolsSelect) as quantity
from kagglesurvey
where WorkToolsSelect like '%Python%';

select count(WorkToolsSelect) as quantity
from kagglesurvey
where WorkToolsSelect like '%Amazon Web Services%';

select count(WorkToolsSelect) as quantity
from kagglesurvey
where WorkToolsSelect like '%SQL%';

select count(WorkToolsSelect) as quantity
from kagglesurvey
where WorkToolsSelect like '%TensorFlow%';