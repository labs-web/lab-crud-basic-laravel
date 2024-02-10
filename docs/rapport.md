---
layout: default
order: 1
---


{% assign chapitres = site.pages | sort: "order" %}

{% for chapitre in chapitres %}
  {% if page.url != "/feed.xml" and  page.url != "/" and page.url != "/presentation.html" and page.url != "/index.html" and page.url != "/rapport.html" and page.url != "/assets/css/style.css"   %}
    {{- chapitre.content -}}
  {% endif %}
{% endfor %}

