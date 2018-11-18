select students.FirstName, students.LastName,injuries.Name, injury_report.Description, injury_report.Date from students
join injury_report on students.ID = injury_report.studentID
join injuries on injury_report.InjuryReportID = injuries.injuriesID
where students.FirstName = 'carter';


select  injuries.Name, COUNT(injury_report.InjuryID) from injuries
join injury_report on injuries.injuriesID =injury_report.InjuryID
group by injuries.Name;


ADD SPORT NEXT ^^
