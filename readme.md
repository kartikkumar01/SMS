Tailwind variables are used for text colors, background colors, font-size and box shadow.

Colors used:
    /* Light Mode Colors */
        --color-bg-light: #fff;   /* Background */
        --color-text-light: rgb(66, 66, 66); /* Text */
        --color-primary-light: #3F5BD9; /* Primary Accent */
        --color-secondary-light: #2A394E; /* Secondary Accent */
      
    /* Dark Mode Colors */
        --color-bg-dark: #000;    /* Background */
        --color-text-dark: rgb(230, 230, 230);  /* Text */
        --color-primary-dark: #3F5BD9; /* Primary Accent */
        --color-secondary-dark: #021526; /* Secondary modern ui color */ 
        --color-hsecondary-dark : #101218; /*except for header and footer*/
        
    /* color for link for both dark and light mode */    
        --color-link : #4189d5;

Font size used:
    --text-heading-desktop : 36px;
    --text-subheading-desktop : 30px;
    --text-body-desktop : 20px;
    --------------------------------
    --text-heading-mobile: 28px;
    --text-subheading-mobile: 24px;
    --text-body-mobile: 18px;

Box shadow used:
    --shadow-box-light : 0 4px 10px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.06);
    --shadow-box-dark : 0 4px 15px rgba(0, 0, 0, 0.6), 0 2px 6px rgba(0, 0, 0, 0.3);

Working of Finnhub api:
//stock profile api -> https://finnhub.io/api/v1/stock/profile2?symbol=${symbol}&token=${apiKey}
// stock quote api - >https://finnhub.io/api/v1/quote?symbol=${symbol}&token=${apiKey}
//api key -> cvamlkhr01qsapma7ru0cvamlkhr01qsapma7rug


//Finnhub return empty object for invalid symbol
//Finnhub returns object with 1 property called error for invalid key
//Finnhub returns response if everything is alright




