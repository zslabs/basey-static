(($) ->
  "use strict"

  # SVG Icons
  svgSpritePath = '/assets/svg/build/sprite.svg'

  ## Set multiple attributes for element
  setAttributes = (el, attrs) ->
    Array::slice.call(attrs).forEach (attr) ->
      el.setAttribute attr.name, attr.value unless attr.name is "data-bt-icon"
      return
    return

  Array::forEach.call document.querySelectorAll("[data-bt-icon]"), (element, index) ->
    svg = document.createElementNS 'http://www.w3.org/2000/svg', 'svg'
    setAttributes svg, element.attributes

    use = document.createElementNS('http://www.w3.org/2000/svg', 'use')
    use.setAttributeNS(
      'http://www.w3.org/1999/xlink',
      'xlink:href',
      svgSpritePath + '#' + element.dataset.btIcon
    )

    svg.appendChild use
    element.parentNode.replaceChild svg, element
    return

  # Placeholder
  $('[placeholder]').placeholder()

  return
) jQuery