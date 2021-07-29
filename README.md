# okcupid-csrf-phishing-poc
  In 2019, okcupid.com had a vulnerability that allowed POST variables to be submitted using GET parameters. okcupid did not appear to understand the issue in this, so I created a website, notokcupid.com, to prove that this is, in fact, not how a secure application should act.
  
  This is a phishing site that could (theoretically, but doesn't) capture credentials, then seamlessly logs the user into okcupid with absolutely no other user interaction needed. This would completely hide the fact the user had been phished as it would act identically to actually logging into okcupid.com.
  
  This code only works if the web server is configured to process all requests to the domain with index.php.
  
  Published for posterity.