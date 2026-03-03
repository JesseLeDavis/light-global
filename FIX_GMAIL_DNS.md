# Fix Gmail/Google Workspace After Domain Transfer

## Problem
After transferring domain to Hostinger, emails at DCD@thelightglobal.com and info@thelightglobal.com stopped working.

## Solution: Update DNS MX Records

### Step 1: Log into Hostinger

1. Go to: https://hpanel.hostinger.com
2. Log in with your credentials

### Step 2: Access DNS Settings

1. Click **"Domains"** in the left sidebar
2. Find **thelightglobal.com** and click on it
3. Click **"DNS / Name Servers"** tab

### Step 3: Delete Hostinger MX Records

Look for existing MX records (they probably look like):
- `mx1.hostinger.com`
- `mx2.hostinger.com`

**Delete all existing MX records** by clicking the trash/delete icon next to each one.

### Step 4: Add Google Workspace MX Records

Click **"Add Record"** and add these 5 MX records:

#### MX Record 1:
- **Type:** MX
- **Name:** @ (or leave blank)
- **Priority:** 1
- **Points to:** ASPMX.L.GOOGLE.COM
- **TTL:** 3600 (or default)

#### MX Record 2:
- **Type:** MX
- **Name:** @ (or leave blank)
- **Priority:** 5
- **Points to:** ALT1.ASPMX.L.GOOGLE.COM
- **TTL:** 3600

#### MX Record 3:
- **Type:** MX
- **Name:** @ (or leave blank)
- **Priority:** 5
- **Points to:** ALT2.ASPMX.L.GOOGLE.COM
- **TTL:** 3600

#### MX Record 4:
- **Type:** MX
- **Name:** @ (or leave blank)
- **Priority:** 10
- **Points to:** ALT3.ASPMX.L.GOOGLE.COM
- **TTL:** 3600

#### MX Record 5:
- **Type:** MX
- **Name:** @ (or leave blank)
- **Priority:** 10
- **Points to:** ALT4.ASPMX.L.GOOGLE.COM
- **TTL:** 3600

### Step 5: Verify Other Google Records (Optional but Recommended)

While you're in DNS settings, check if these exist (if not, don't worry):

**SPF Record (TXT):**
- **Type:** TXT
- **Name:** @ (or leave blank)
- **Value:** `v=spf1 include:_spf.google.com ~all`

**DKIM Record:**
- You may need to get this from Google Workspace Admin Console

### Step 6: Save and Wait

1. Click **"Save"** or **"Add Record"** for each MX record
2. **Wait 1-24 hours** for DNS changes to propagate (usually faster)
3. Test by sending an email to DCD@thelightglobal.com

## How to Test

### Test 1: Check MX Records
After a few hours, check if MX records updated:
1. Go to: https://mxtoolbox.com
2. Enter: `thelightglobal.com`
3. Click "MX Lookup"
4. You should see Google's mail servers listed

### Test 2: Send Test Email
1. From your personal email, send a test to `DCD@thelightglobal.com`
2. Check if it arrives in his Gmail
3. Have him try sending an email from DCD@thelightglobal.com

## Timeline

- **Immediate (0-1 hour):** Some emails may start working
- **1-6 hours:** Most emails should work
- **24-48 hours:** Full propagation complete worldwide

## Troubleshooting

### If emails still don't work after 24 hours:

1. **Verify MX records are correct:**
   - Use https://mxtoolbox.com/SuperTool.aspx
   - Enter your domain
   - Check MX records match Google's

2. **Check Google Workspace is still active:**
   - Log into https://admin.google.com
   - Verify the accounts still exist
   - Check billing is active

3. **Check nameservers:**
   - In Hostinger DNS settings
   - Nameservers should be Hostinger's (this is correct)
   - Something like: `ns1.dns-parking.com` or `ns1.hostinger.com`

### Common Mistakes to Avoid:

- ❌ Don't add `.` at the end of MX records (Hostinger may add it automatically)
- ❌ Don't forget the priority numbers (1, 5, 5, 10, 10)
- ❌ Don't keep both Hostinger AND Google MX records (delete Hostinger's)
- ✅ Make sure the Name field is `@` or blank (not `mail` or anything else)

## What About the Contact Form?

Once the MX records are updated and Gmail is working again:
- The contact form will automatically deliver to `DCD@thelightglobal.com`
- No code changes needed
- He'll receive speaking requests in his Gmail

## Quick Reference: Google Workspace MX Records

Priority | Hostname
---------|----------
1        | ASPMX.L.GOOGLE.COM
5        | ALT1.ASPMX.L.GOOGLE.COM
5        | ALT2.ASPMX.L.GOOGLE.COM
10       | ALT3.ASPMX.L.GOOGLE.COM
10       | ALT4.ASPMX.L.GOOGLE.COM

## Need More Help?

If you're stuck on any step:
1. Take a screenshot of the Hostinger DNS page
2. Share what you see and I can help guide you through it

The most important thing is to **delete the Hostinger MX records** and **add the Google MX records exactly as shown above**.
