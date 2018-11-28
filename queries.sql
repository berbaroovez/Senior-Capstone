select students.FirstName, students.LastName,injuries.Name, injury_report.Description, injury_report.Date from students
join injury_report on students.ID = injury_report.studentID
join injuries on injury_report.InjuryReportID = injuries.injuriesID
where students.FirstName = 'carter';


select  injuries.Name, COUNT(injury_report.InjuryID) from injuries
join injury_report on injuries.injuriesID =injury_report.InjuryID
group by injuries.Name;


ADD SPORT NEXT ^^


select students.FirstName, students.LastName, sports.Name as 'Sports Name',
injuries.Name as 'Injuries Name', injury_report.Description, injury_report.Date
from injury_report join students on injury_report.studentID = students.ID
join sports on injury_report.sportID = sports.sportsID
join injuries on injury_report.InjuryID = injuries.injuriesID;



<<<<<<< HEAD
query for trainerDateLookup
=======
query for date 
>>>>>>> c9a44bdf4a5ec2491273241fba5936491db46458
select students.FirstName, students.LastName, injuries.Name, injury_report.Description,injury_report.Date
from injury_report join students on injury_report.studentID = students.ID
join sports on injury_report.sportID = sports.sportsID
join injuries on injury_report.InjuryID = injuries.injuriesID
where injury_report.Date between "2018-11-19" and "2018-11-25";
