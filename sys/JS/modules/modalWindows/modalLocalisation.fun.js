function pmModalLoc(text) {
    let _lang = document.querySelector("html");
    let lang = _lang.getAttribute("lang");
    let obj = {
        1: {
            en: "Business Clients",
            he: "ללקוחות עסקיים"
        },
        2: {
            en: "Private Clients",
            he: "ללקוחות פרטיים"
        },
        3: {
            en: "Leave details and we will contact you immediately",
            he: "השאירו פרטים ומיד ניצור עמכם קשר"
        },
        4: {
            en: "Contact Name",
            he: "שם איש קשר"
        },
        5: {
            en: "Full name",
            he: "שם מלא"
        },
        6: {
            en: "Name of company/corporation",
            he: "שם החברה/תאגיד"
        },
        7: {
            en: "HF/ID number",
            he: "מספר ח.פ./ת.ז"
        },

        8: {
            en: "Email",
            he: "כתובת דואל"
        },
        9: {
            en: "Contact phone number",
            he: "טלפון ליצירת קשר"
        },
        10: {
            en: "I agree with the terms of the policy",
            he: "אני מסכים עם תנאי המדיניות"
        },
        11: {
            en: "I agree to receive relevant mailings and updates to email",
            he: "אני מסכים לקבל דיוור ועדכונים רלוונטיים לדואל"
        },
        12: {
            en: "Our representative will contact you as soon as possible. Thank you for your inquiry!",
            he: "נציגנו יצרו עמכם קשר בהקדם האפשרי. תודה על פנייתכם!"
        },
        13: {
            en: "Please fill all the required fields",
            he: "נא מלא את כל הפרטים הנדרשים"
        },
        14: {
            en: "Please enter valid email address",
            he: "אנא הזן כתובת דואל חוקית"
        },
        15: {
            en: "Please enter valid telephone number",
            he: "אנא הזן מספר טלפון חוקי"
        },
        16: {
            en: "Please accept the Terms of Service",
            he: "אנא קבל את תנאי השירות"
        },
        17: {
            en: "ID number",
            he: "מספר ת.ז"
        },
        18: {
            en: "Import Calculator is currently in development",
            he: "מחשבון יבוא נמצא כעת בפיתוח"
        },
        19: {
            en: "Our representative will contact you as soon as possible. Thank you for your inquiry!",
            he: "נציגנו יצרו עמכם קשר בהקדם האפשרי. תודה על פנייתכם!"
        },
        20: {
            en: "Request subject",
            he: "נושא הפניה"
        },





    }
    return obj[text][lang];
}