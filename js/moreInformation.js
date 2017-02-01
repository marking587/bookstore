/**
 * Created by siggi on 12.01.17.
 */
function toggleNode(node)
{
    var nodeArray = node.childNodes;
    for(i=0; i < nodeArray.length; i++)
    {
        node = nodeArray[i];
        if (node.tagName && node.tagName.toLowerCase() == 'div')
            node.style.display = (node.style.display == 'block') ? 'none' : 'block';
    }
}