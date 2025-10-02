# Site Content Management

This site uses a JSON file to store all dynamic content, making it easy to update without touching the code.

## File Location
`storage/app/public/data/site-content.json`

## How to Update Content

### Method 1: Edit JSON File Directly
Simply edit the `site-content.json` file and save. The changes will appear on the site immediately.

### Method 2: Use Artisan Command
```bash
# Update a specific field
php artisan site:update site title "My New Title"
php artisan site:update about description "New description here"
php artisan site:update contact email "new@email.com"

# List available sections
php artisan site:update projects
```

## Content Structure

### Site Info
- `title`: Main site title
- `subtitle`: Subtitle (e.g., "Under Construction")
- `lastUpdated`: Last update date
- `visitorCount`: Visitor counter number
- `banner`: Animated banner text

### About Section
- `description`: Main description
- `description2`: Secondary description
- `skills`: Array of skills

### Projects
Array of project objects with:
- `title`: Project name
- `emoji`: Display emoji
- `description`: Project description
- `links.view`: View project URL
- `links.download`: Download URL
- `badge`: Optional badge (NEW!, HOT!, etc.)

### Writing
Array of article objects with:
- `title`: Article title
- `description`: Article description
- `date`: Publication date
- `link`: Article URL
- `badge`: Optional badge

### Links
Array of link objects with:
- `name`: Display name
- `url`: Link URL

### Contact
- `email`: Contact email
- `github`: GitHub URL
- `twitter`: Twitter URL
- `message`: Contact message

## Examples

### Add a New Project
Add this to the `projects` array:
```json
{
  "title": "My New App",
  "emoji": "📱",
  "description": "A cool new mobile application.",
  "links": {
    "view": "https://example.com",
    "download": "https://example.com/download"
  },
  "badge": "NEW!"
}
```

### Add a New Article
Add this to the `writing` array:
```json
{
  "title": "My New Article",
  "description": "This is about something interesting.",
  "date": "December 19, 2024",
  "link": "https://example.com/article",
  "badge": "HOT!"
}
```

### Update Visitor Count
```bash
php artisan site:update site visitorCount 1338
```

## Tips
- Always backup the JSON file before making major changes
- Use proper JSON syntax (quotes around strings, commas between items)
- Test changes by refreshing the site
- The site will gracefully handle missing fields with default values
