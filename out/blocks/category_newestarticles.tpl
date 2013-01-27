[{$smarty.block.parent}]
[{if $oView->getNewestArticles()|@count > 0}]
	[{include file="widget/product/list.tpl" type=$oViewConf->getViewThemeParam('sStartPageListDisplayType') head="PAGE_SHOP_START_JUSTARRIVED"|oxmultilangassign listId="newItems" products=$oView->getNewestArticles() showMainLink=true}]
[{/if}]