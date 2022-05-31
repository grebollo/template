var ALTM = window.ALTM || {};

ALTM.IsMobile = screen.width < 992;
ALTM.OpenMenu = false;
ALTM.CurrentTab = '';

window.onload = ()=> {
    ALTM.Slides.init();
    ALTM.Menu.init();
    ALTM.Accordion.init();
};

ALTM.Menu = ALTM.Menu || {
    init: ()=> {
        const menuTogglers = document.querySelectorAll('.toggle-menu');

        menuTogglers.forEach(item=> {
            item.addEventListener('click', (e)=> {
                e.preventDefault();
                const isClose = item.tagName.toLowerCase() === 'svg';
                ALTM.Menu.toggleMenu(e.currentTarget, isClose);
            }, false);
        });

        if (!ALTM.IsMobile) {
            const hoverableLinks = document.querySelectorAll('a.menu-project-link span');

            hoverableLinks.forEach(item=> {
                item.addEventListener('mouseover', (e)=> {
                    ALTM.Menu.toggleBackground(e.target.dataset.targetBg);
                }, false);

                item.addEventListener('mouseout', ()=> {
                    ALTM.Menu.removeBackground();
                }, false);
            });
        } else {
            const tabLinks = document.querySelectorAll('a.tablinks');

            tabLinks.forEach(item=>{
                item.addEventListener('click', (e)=> {
                    e.preventDefault();
                    const dataClasses = e.currentTarget.dataset.class.split(' '),
                          targetClass = dataClasses[dataClasses.length - 1],
                          targetTab = document.querySelector('div.tabcontent.' + targetClass);
                    
                    ALTM.Menu.handleUnderline('menu', false, e.currentTarget);
                    ALTM.Tabs.tab(targetTab);
                    ALTM.CurrentTab = targetClass;
                });
            });
        }
    },
    toggleMenu: (target, isCloseBtn)=> {
        const menu = document.getElementById(ALTM.IsMobile ? 'sm-menu' : 'lg-menu'),
              closeBtn = document.querySelector('svg.close-menu');

        let targetClass, targetClasses;

        if (!isCloseBtn) {
            targetClasses = target.dataset.class.split(' ');
            targetClass = targetClasses ? targetClasses[targetClasses.length - 1] : '';
        }

        const targetTab = isCloseBtn ? document.querySelector('div.tabcontent.' + ALTM.CurrentTab) 
                                     : document.querySelector('div.tabcontent.' + targetClass);

        if (ALTM.OpenMenu) {    
            if ((targetClass === ALTM.CurrentTab) || isCloseBtn) {
                closeBtn.classList.remove('menu-visibility');
                ALTM.Menu.handleUnderline('menu', true, target);
                ALTM.Accordion.close();

                if (targetTab) {
                    targetTab.classList.remove('menu-visibility');
                }

                if (ALTM.IsMobile) {
                    document.getElementById('sm-menu-heading').classList.remove('menu-visibility');
                }

                setTimeout(()=> {
                    menu.classList.toggle('menu-display');
                    ALTM.OpenMenu = false;
                    ALTM.CurrentTab = '';
                }, 500);
            } else {
                ALTM.Tabs.tab(targetTab);
                ALTM.CurrentTab = targetClass;
                ALTM.Menu.handleUnderline('menu', false, target);
            }
        } else {
            menu.classList.toggle('menu-display');
            ALTM.CurrentTab = targetClass;
            ALTM.OpenMenu = true;

            if (!ALTM.IsMobile) {
                ALTM.Menu.handleUnderline('menu', false, target);
            } else {
                ALTM.Menu.handleUnderline('menu', false, document.querySelectorAll('a.tablinks')[0]);
            }

            setTimeout(()=> {
                ALTM.Tabs.tab(targetTab);
                closeBtn.classList.add('menu-visibility');

                if (ALTM.IsMobile) {
                    document.getElementById('sm-menu-heading').classList.add('menu-visibility');
                }
            }, 600);       
        }
    },
    toggleBackground: (id)=> {
        const bgImgTarget = document.querySelector('div[data-id="' + id + '"]'),
              menuBgColor = bgImgTarget.dataset.menuBg,
              menu = document.getElementById('lg-menu-left');

        ALTM.Menu.removeBackground();
        bgImgTarget.classList.add('bg-display');
        menu.style.backgroundColor = menuBgColor;
    },
    removeBackground: ()=> {
        const rightItems = document.querySelectorAll('div.lg-menu-right');

        if (rightItems) {
            rightItems.forEach(item=> item.classList.remove('bg-display'));
        }

        document.getElementById('lg-menu-left').style.backgroundColor = '#eeecda';
    },
    handleUnderline: (from, close, target)=> {
        if (from === 'menu') {
            const tabLinks = document.querySelectorAll('a.tablinks');

            if (!close) {
                tabLinks.forEach(item=> item.classList.remove('hover-active'));
                target.classList.add('hover-active');
            } else {
                tabLinks.forEach(item=> item.classList.remove('hover-active'));
            }
        } else if (from === 'accordion') {
            if (!close) {
                if (target.tagName.toLowerCase() !== 'button') {
                    target.classList.toggle('hover-active');
                }   
            } else {
                target.classList.remove('hover-active');

                if (target.tagName.toLowerCase() === 'button') {
                    const targetArrow = document.querySelector('button svg');
    
                    if (targetArrow) {
                        targetArrow.style.transform = 'rotate(180deg)';
                    }
                }
            } 
        }
    }
};

ALTM.Slides = ALTM.Slides || {
    init: ()=> {
        new fullpage('#slides', {
            licenseKey: '28AB50A0-981A4756-888B29E7-95C03D54',
            controlArrows: false,
            normalScrollElements: '#sm-menu, #lg-menu',
            onLeave: (origin, destination, direction)=> {
                const lgMenu = document.getElementById('lg-menu'),
                      smMenu = document.getElementById('sm-menu');

                if (lgMenu && lgMenu.classList.contains('menu-display')
                    || smMenu && smMenu.classList.contains('menu-display')) {
                        return false;
                }
            }
        });
    }
};

ALTM.Accordion = ALTM.Accordion || {
    init: ()=> {
        const accordions = document.querySelectorAll('.accordion'),
              closeMoreLinks = document.querySelectorAll('.close-more');

        accordions.forEach(item=> {
            item.addEventListener('click', (el)=> {
                const type = el.currentTarget.dataset.type,
                      target = document.querySelector('span#load-more-' + el.currentTarget.dataset.target),
                      targetTagName = el.currentTarget.tagName;

                if (type === 'project') {
                    ALTM.Accordion.projects(target, targetTagName);
                } else if (type === 'info') {
                    ALTM.Accordion.info(target, el.currentTarget, false);
                }
            }, false);
        });

        closeMoreLinks.forEach(item=> {
            item.addEventListener('click', (el)=> {
                el.preventDefault();
                const target = document.querySelector('span#load-more-' + el.currentTarget.dataset.target);
                ALTM.Accordion.info(target, el.currentTarget, true);
            }, false);        
        });
    },
    projects: (target, targetTagName)=> {
        const targetArrow = document.querySelector(targetTagName.toLowerCase() + ' svg');

        if (target.style.maxHeight) {  
            targetArrow.style.transform = 'rotate(180deg)';
            target.style.maxHeight = null;
        } else {
            target.style.maxHeight = target.scrollHeight + 'px';
            targetArrow.style.transform = 'rotate(0deg)';
        }
    },
    info: (target, clickedEl, isClose)=> {
        if (!isClose) {
            ALTM.Menu.handleUnderline('accordion', isClose, clickedEl);
        } else {
            const item = document.querySelector('a[data-target=' + clickedEl.dataset.target + ']');
            ALTM.Menu.handleUnderline('accordion', isClose, item); 
        }
               
        if (target.style.maxHeight) {  
            target.style.maxHeight = null;
        } else {
            target.style.maxHeight = target.scrollHeight + 'px';
        }
    },
    close: ()=> {
        const accordions = document.querySelectorAll('.accordion');
        
        accordions.forEach(item=> {
            ALTM.Menu.handleUnderline('accordion', true, item);
            const target = document.querySelector('span#load-more-' + item.dataset.target);
            target.style.maxHeight = null;
        });
    }
};

ALTM.Tabs = ALTM.Tabs || {
    tab: (targetTab)=> {
        const tabcontents = document.querySelectorAll('div.tabcontent');

        tabcontents.forEach(item=> {
            item.classList.add('d-none');
            item.classList.remove('menu-visibility');
        });

        targetTab.classList.remove('d-none');   
        setTimeout(()=> targetTab.classList.add('menu-visibility', 500));
    }
};