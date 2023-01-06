Dear {{ $mailData['name'] }},
<p>Thank you for scheduling your appointment with Healthbar Medical Center.</p>
<p>The details of your appointment are below:</p>
Time & Date: {{ $mailData['date'] }} at {{ $mailData['time'] }}
<br>
With: Dr. {{ $mailData['doctorName'] }}
<br>
Where: 323 North St Los Angeles CA, 90001
<br>
Contact: (310) 333-3333
<br>
Email: Healthbar@gmail.com
